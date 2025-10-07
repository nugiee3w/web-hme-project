#!/bin/bash

echo "🔍 PHP Extensions Check:"
php -m | grep -E "(pdo|mysql|mysqli)"

echo ""
echo "🔍 PDO Drivers Available:"
php -r "print_r(PDO::getAvailableDrivers());"

echo ""
echo "🔍 Database Connection Test:"
if [ ! -z "$DB_HOST" ]; then
    php -r "
    try {
        echo 'Testing connection to: ' . \$_ENV['DB_HOST'] . ':' . \$_ENV['DB_PORT'] . PHP_EOL;
        \$dsn = 'mysql:host=' . \$_ENV['DB_HOST'] . ';port=' . \$_ENV['DB_PORT'] . ';dbname=' . \$_ENV['DB_DATABASE'];
        \$pdo = new PDO(\$dsn, \$_ENV['DB_USERNAME'], \$_ENV['DB_PASSWORD']);
        echo '✅ Database connection successful!' . PHP_EOL;
        echo 'MySQL Version: ' . \$pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . PHP_EOL;
    } catch (Exception \$e) {
        echo '❌ Database connection failed: ' . \$e->getMessage() . PHP_EOL;
        echo 'DSN: ' . \$dsn . PHP_EOL;
        exit(1);
    }
    "
else
    echo "❌ Database environment variables not set"
    echo "Available ENV vars:"
    env | grep -E "(DB_|APP_)"
fi
