<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

// Required environment variables
$required = [
    'DB_HOST',
    'DB_PORT',
    'DB_NAME',
    'DB_USER',
    'DB_PASSWORD',
    'WEB_ROUTE'
];

// Validate required environment variables
foreach ($required as $var) {
    if (!isset($_ENV[$var])) {
        throw new RuntimeException("Missing required environment variable: {$var}");
    }
}

// Define constants with validated values
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('WEB_ROUTE', $_ENV['WEB_ROUTE']);

// Define DSN for database connection
define('DSN', sprintf(
    "pgsql:host=%s;port=%s;dbname=%s;sslmode=require",
    DB_HOST,
    DB_PORT,
    DB_NAME
));







