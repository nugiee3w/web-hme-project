#!/bin/bash
# Railway.app deployment script

echo "Starting Laravel deployment on Railway..."

# Install PHP dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Generate application key if not exists
if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan key:generate --force

# Cache configurations for better performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (uncomment if needed)
# php artisan migrate --force

echo "Laravel deployment completed!"

# Start the application
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
