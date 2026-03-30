FROM php:8.2-apache

# Install system dependencies
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

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Setup environment file
RUN cp .env.example .env && \
    php artisan key:generate

# Create SQLite database directory
RUN mkdir -p database && \
    touch database/database.sqlite && \
    chmod 666 database/database.sqlite

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 storage && \
    chmod -R 755 bootstrap/cache

# Run migrations
RUN php artisan migrate --force || true

# Update Apache configuration
RUN echo "Listen 0.0.0.0:80" >> /etc/apache2/ports.conf && \
    sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/default-ssl.conf 2>/dev/null || true

# Enable required Apache modules
RUN a2enmod rewrite headers

EXPOSE 80

CMD ["apache2-foreground"]
