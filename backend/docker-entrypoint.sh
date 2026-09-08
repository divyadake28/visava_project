#!/bin/sh
set -e

# Determine the port assigned by Render (defaults to 10000 if not set)
PORT="${PORT:-10000}"

# Ensure storage directories and permissions
mkdir -p storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         storage/app/public

chmod -R 775 storage bootstrap/cache || true

# Create storage symbolic link for public assets / uploads
php artisan storage:link || true

# Production caches (safe caching)
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Laravel application on port ${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
