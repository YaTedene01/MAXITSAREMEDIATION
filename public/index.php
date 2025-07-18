<?php
ini_set('display_error', 1);
ini_set('display_startup_error',1);
error_reporting(E_ALL);
require_once __DIR__. '/../app/config/bootstrap.php';
\App\core\Router::resolve();

