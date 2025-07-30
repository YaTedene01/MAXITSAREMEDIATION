<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/config/env.php';

// Start session before any output
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use \App\core\App;
App::loadDependenciesFromYaml(__DIR__.'/../app/config/service.yaml');
require_once __DIR__. '/../app/config/bootstrap.php';
\App\core\Router::resolve();

