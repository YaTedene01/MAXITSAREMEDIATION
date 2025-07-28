<?php
namespace App\core;
class Router{
    public static function resolve(){
        $uri = $_SERVER['REQUEST_URI']??'/';
        $routes = require_once __DIR__.'/../../routes/route.web.php';
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (array_key_exists($uri, $routes)){
            $controller = $routes[$uri]['controller'];
            $action = $routes[$uri]['action'];
            $controller = App::getDependency('controllers', $controller);
            $controller->$action();
        }
        
    }
}