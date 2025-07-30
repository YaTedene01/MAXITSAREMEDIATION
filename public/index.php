<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use \App\core\App;
App::loadDependenciesFromYaml(__DIR__.'/../app/config/service.yaml');
require_once __DIR__. '/../app/config/bootstrap.php';
\App\core\Router::resolve();

