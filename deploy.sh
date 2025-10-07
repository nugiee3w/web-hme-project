#!/bin/bash

# Exit on any error
set -e

echo "🚀 Starting deployment process..."

# Install dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "📦 Installing Node.js dependencies..."
npm ci

echo "🔨 Building assets..."
npm run build

echo "🗄️ Running database migrations..."
php artisan migrate --force

echo "🧹 Clearing and caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Deployment completed successfully!"
