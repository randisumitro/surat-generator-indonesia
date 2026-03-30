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

# Enable Apache modules
RUN a2enmod rewrite headers

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --no-scripts

# Setup environment
RUN cp .env.example .env && \
    php artisan key:generate --force

# Create SQLite database
RUN mkdir -p database && \
    touch database/database.sqlite && \
    chmod 777 database && \
    chmod 666 database/database.sqlite

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 777 storage && \
    chmod -R 777 bootstrap/cache

# Run migrations
RUN php artisan migrate --force || true

# Configure Apache for Railway
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Add ServerName directive to suppress warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Create a simple health check file
RUN echo '{"status":"healthy"}' > /var/www/html/public/health.json

EXPOSE 80

CMD ["apache2-foreground"]
