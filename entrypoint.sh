#!/bin/bash
set -e

# Debug environment
echo "=== Environment Debug ==="
echo "APP_ENV: $APP_ENV"
echo "APP_KEY: $APP_KEY"
echo "APP_URL: $APP_URL"
echo "DB_CONNECTION: $DB_CONNECTION"
echo "DB_DATABASE: $DB_DATABASE"
echo "PORT: $PORT"

# Create database if SQLite
if [ "$DB_CONNECTION" = "sqlite" ]; then
    mkdir -p "$(dirname $DB_DATABASE)"
    touch "$DB_DATABASE"
    chmod 666 "$DB_DATABASE"
fi

# Set permissions
chmod -R 777 storage bootstrap/cache

# Test Laravel
php artisan --version || echo "Laravel not working"
php artisan config:cache || echo "Config cache failed"

# Start Apache manually
echo "=== Starting Apache ==="
apache2ctl -D FOREGROUND
