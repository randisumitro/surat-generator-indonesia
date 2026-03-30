#!/bin/bash
set -e

# Ensure proper permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database 2>/dev/null || true
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database 2>/dev/null || true

# Run migrations
php artisan migrate --force 2>/dev/null || true

# Start Apache
exec apache2-foreground
