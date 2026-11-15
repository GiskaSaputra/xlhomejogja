#!/bin/sh
set -e

# If .env does not exist, copy from .env.example
if [ ! -f /var/www/.env ]; then
    echo "Creating .env from .env.example..."
    cp /var/www/.env.example /var/www/.env
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64:" /var/www/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Ensure uploads and storage directories exist with proper permissions
mkdir -p /var/www/public/uploads/posters /var/www/storage/app
chown -R www-data:www-data /var/www/public/uploads /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/public/uploads /var/www/storage /var/www/bootstrap/cache

# Run migrations if database is configured
php artisan migrate --force --isolated || true

# Optimize cache for production
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

exec "$@"
