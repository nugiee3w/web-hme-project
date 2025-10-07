#!/bin/bash

echo "🔍 Pre-deployment Configuration Check"
echo "====================================="

# Check required files
echo "📁 Checking required files..."
required_files=("Dockerfile" "start.sh" "composer.json" "package.json")
for file in "${required_files[@]}"; do
    if [ -f "$file" ]; then
        echo "✅ $file exists"
    else
        echo "❌ $file missing"
    fi
done

# Check if .env.example exists
if [ -f ".env.example" ]; then
    echo "✅ .env.example exists"
    
    # Check for required environment variables in .env.example
    required_env_vars=("APP_NAME" "APP_ENV" "APP_KEY" "DB_CONNECTION" "DB_HOST" "DB_DATABASE")
    echo ""
    echo "🔧 Checking .env.example for required variables..."
    for var in "${required_env_vars[@]}"; do
        if grep -q "^$var=" .env.example; then
            echo "✅ $var found in .env.example"
        else
            echo "❌ $var missing in .env.example"
        fi
    done
else
    echo "❌ .env.example missing"
fi

# Check composer.json for required dependencies
echo ""
echo "📦 Checking composer.json dependencies..."
if [ -f "composer.json" ]; then
    required_deps=("laravel/framework" "guzzlehttp/guzzle")
    for dep in "${required_deps[@]}"; do
        if grep -q "\"$dep\"" composer.json; then
            echo "✅ $dep found"
        else
            echo "❌ $dep missing"
        fi
    done
else
    echo "❌ composer.json not found"
fi

# Check package.json
echo ""
echo "📦 Checking package.json..."
if [ -f "package.json" ]; then
    if grep -q "\"build\"" package.json; then
        echo "✅ build script found in package.json"
    else
        echo "❌ build script missing in package.json"
    fi
    
    if grep -q "\"vite\"" package.json; then
        echo "✅ Vite found in dependencies"
    else
        echo "⚠️ Vite not found - might cause build issues"
    fi
else
    echo "❌ package.json not found"
fi

# Check for Railway config files
echo ""
echo "🚂 Checking Railway configuration..."
railway_configs=("railway.json" "railway.toml" "Procfile")
found_config=false
for config in "${railway_configs[@]}"; do
    if [ -f "$config" ]; then
        echo "✅ $config exists"
        found_config=true
    fi
done

if [ "$found_config" = false ]; then
    echo "⚠️ No Railway config file found (railway.json, railway.toml, or Procfile)"
fi

# Check directory structure
echo ""
echo "📂 Checking Laravel directory structure..."
laravel_dirs=("app" "config" "database" "public" "resources" "routes" "storage")
for dir in "${laravel_dirs[@]}"; do
    if [ -d "$dir" ]; then
        echo "✅ $dir/ directory exists"
    else
        echo "❌ $dir/ directory missing"
    fi
done

# Final recommendations
echo ""
echo "📋 Pre-deployment Checklist:"
echo "□ Push all changes to GitHub"
echo "□ Set up MySQL service in Railway"
echo "□ Configure environment variables in Railway"
echo "□ Generate APP_KEY: php artisan key:generate --show"
echo "□ Test local Docker build: docker build -t test-app ."
echo ""
echo "🚀 Ready for Railway deployment!"
