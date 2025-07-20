<?php
require_once __DIR__.'/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

define('DSN',$_ENV['DSN']);
define('DB_USER',$_ENV['DB_USER']);
define('DB_PASSWORD',$_ENV['DB_PASSWORD']);
define('WEB_ROUTE',$_ENV['WEB_ROUTE']);
define('DB_NAME',$_ENV['DB_NAME']);





