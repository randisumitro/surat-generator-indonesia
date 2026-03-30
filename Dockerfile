FROM php:8.2-cli

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
RUN chmod -R 777 storage && \
    chmod -R 777 bootstrap/cache

# Run migrations
RUN php artisan migrate --force || true

# Create health check file
RUN echo '{"status":"healthy"}' > public/health.json

EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
