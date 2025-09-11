#!/bin/bash
# Simple startup script for Railway

# Ensure .env exists
if [ ! -f .env ]; then
    cp .env.example .env
    echo "APP_KEY=base64:KhUmI9k//WiT6BW5g4p2AIZkp61XQENc8cBBe+7ESKo=" >> .env
    echo "APP_ENV=production" >> .env
    echo "APP_DEBUG=false" >> .env
fi

# Start the application
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
