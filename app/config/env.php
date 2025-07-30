<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

define('WEB_ROUTE', $_ENV['WEB_ROUTE'] ?? '');
define('DB_NAME', $_ENV['DB_NAME'] ?? '');
define('DB_PORT', $_ENV['DB_PORT'] ?? '');
define('DB_HOST', $_ENV['DB_HOST'] ?? '');
define('DB_USER', $_ENV['DB_USER'] ?? '');
define('DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? '');
define('DSN', $_ENV['DSN'] ?? '');







