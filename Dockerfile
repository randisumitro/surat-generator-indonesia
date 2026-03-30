FROM php:8.2-apache

# Install dependencies
RUN apt-get update -qq && \
    apt-get install -y -qq \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    libicu-dev \
    zip \
    unzip \
    git \
    curl && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip intl

# Fix Apache config
RUN a2enmod rewrite && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy and setup application
COPY . .
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

# Configure Apache for Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Fix port for Railway
ENV PORT=8080
EXPOSE 8080
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf && \
    sed -i 's/:80/:${PORT}/g' /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]
