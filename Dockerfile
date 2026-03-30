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

# Enable Apache modules
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy and setup application
COPY . .
RUN composer install --optimize-autoloader --no-dev --no-scripts && \
    cp .env.example .env && \
    php artisan key:generate --force && \
    mkdir -p database && \
    touch database/database.sqlite && \
    chmod 777 database && \
    chmod 666 database/database.sqlite && \
    chmod -R 777 storage && \
    chmod -R 777 bootstrap/cache

# Run migrations
RUN php artisan migrate --force || true

# Configure Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
