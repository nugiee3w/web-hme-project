#!/bin/bash

# Exit on any error
set -e

echo "🚀 Starting Laravel application on Railway..."

# Check if PHP extensions are loaded
echo "🔍 Checking PHP extensions..."
php -m | grep -E "(pdo|pdo_mysql|mysqli)" || {
    echo "❌ Required MySQL extensions not found!"
    php -m
    exit 1
}

echo "✅ MySQL extensions loaded successfully!"

# Wait for database if needed
if [ ! -z "$DB_HOST" ] && [ ! -z "$DB_DATABASE" ]; then
    echo "⏳ Waiting for database connection..."
    
    # Wait up to 60 seconds for database
    timeout=60
    while [ $timeout -gt 0 ]; do
        if php -r "
            try {
                \$pdo = new PDO('mysql:host='.\$_ENV['DB_HOST'].';port='.\$_ENV['DB_PORT'].';dbname='.\$_ENV['DB_DATABASE'], \$_ENV['DB_USERNAME'], \$_ENV['DB_PASSWORD']);
                echo 'Database connected successfully!';
                exit(0);
            } catch (Exception \$e) {
                echo 'Database connection failed: ' . \$e->getMessage();
                exit(1);
            }
        " 2>/dev/null; then
            echo "✅ Database connected!"
            break
        fi
        
        echo "Database not ready, waiting... ($timeout seconds left)"
        sleep 2
        timeout=$((timeout-2))
    done
    
    if [ $timeout -le 0 ]; then
        echo "❌ Database connection timeout!"
        echo "DB_HOST: $DB_HOST"
        echo "DB_PORT: $DB_PORT"
        echo "DB_DATABASE: $DB_DATABASE"
        echo "DB_USERNAME: $DB_USERNAME"
        exit 1
    fi
else
    echo "⚠️ Database environment variables not set, skipping database check"
fi

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Run migrations only if database is configured
if [ ! -z "$DB_HOST" ] && [ ! -z "$DB_DATABASE" ]; then
    echo "🗄️ Running database migrations..."
    php artisan migrate --force
else
    echo "⚠️ Skipping migrations - database not configured"
fi

# Clear and cache configuration
echo "🧹 Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R 755 storage bootstrap/cache

echo "✅ Laravel application ready!"

# Start Apache
exec apache2-foreground
