#!/bin/sh
set -e

# 1. Pastikan file .env ada
if [ ! -f /var/www/.env ]; then
    echo "Creating .env from .env.example..."
    cp /var/www/.env.example /var/www/.env
fi

# 2. Pastikan file database sqlite ada jika menggunakan sqlite
if [ ! -f /var/www/database/database.sqlite ]; then
    echo "Creating database.sqlite..."
    touch /var/www/database/database.sqlite
    chmod 664 /var/www/database/database.sqlite
fi

# 3. Pastikan dependensi vendor ada jika tertimpa volume host
if [ ! -f /var/www/vendor/autoload.php ]; then
    echo "Vendor not found, installing composer packages..."
    composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs
fi

# 4. Pastikan APP_KEY sudah dibuat
if ! grep -q "APP_KEY=base64:" /var/www/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# 5. Pastikan semua direktori runtime storage & cache ada
mkdir -p /var/www/storage/framework/cache/data \
         /var/www/storage/framework/sessions \
         /var/www/storage/framework/views \
         /var/www/storage/logs \
         /var/www/storage/app/public \
         /var/www/public/uploads/posters

# Buat file log jika belum ada
touch /var/www/storage/logs/laravel.log

# 6. Atur kepemilikan dan hak akses
chown -R www-data:www-data /var/www/storage \
                           /var/www/bootstrap/cache \
                           /var/www/public/uploads \
                           /var/www/database

chmod -R 775 /var/www/storage \
             /var/www/bootstrap/cache \
             /var/www/public/uploads \
             /var/www/database

# 7. Bersihkan cache lama lalu buat cache baru
php artisan config:clear || true
php artisan view:clear || true
php artisan route:clear || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

exec "$@"
