#!/bin/bash

echo "🚀 Starting Laravel application..."

# Wait for database connection
if [ -n "$DB_HOST" ]; then
    echo "⏳ Waiting for database..."
    for i in {1..30}; do
        if mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; then
            echo "✅ Database connected!"
            break
        fi
        echo "Waiting for database... ($i/30)"
        sleep 2
    done
fi

# Generate app key if needed
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Run migrations
if [ -n "$DB_HOST" ]; then
    echo "🗄️ Running migrations..."
    php artisan migrate --force
fi

# Cache configuration
echo "🧹 Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Application ready!"

# Start Apache
exec apache2-foreground
