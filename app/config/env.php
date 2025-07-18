<?php
namespace App\config;

$dotenv=\Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();


define('DSN',$_ENV['DSN']);
define('DB_USER',$_ENV['DB_USER']);
define('DB_PASSWORD',$_ENV['DB_PASSWORD']);
define('WEB_ROUTE',$_ENV['WEB_ROUTE']);



