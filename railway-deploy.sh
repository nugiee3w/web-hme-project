#!/bin/bash
# Railway.app deployment script

echo "Starting Laravel deployment on Railway..."

# Set environment variables
export APP_ENV=production
export APP_DEBUG=false

# Install PHP dependencies
echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Setup environment file
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cp .env.example .env
fi

# Generate application key
echo "Generating application key..."
php artisan key:generate --force --no-interaction

# Clear and cache configurations for better performance
echo "Caching configurations..."
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache

# Create storage links
echo "Creating storage links..."
php artisan storage:link || true

# Set proper permissions
echo "Setting permissions..."
chmod -R 755 storage bootstrap/cache

# Run migrations if needed (uncomment if database is configured)
# echo "Running migrations..."
# php artisan migrate --force --no-interaction

echo "Laravel deployment completed successfully!"

# Start the application
echo "Starting application on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
