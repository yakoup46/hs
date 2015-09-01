<?php

require_once 'autoload.php';
require_once 'Controller/Routes.php';
require_once 'config.php';

$routes = new Routes;

if (!is_null($routes->badArg)) {
    echo 'Bad ' . $routes->badArg;
    exit;
}

(new $routes->controller)->{$routes->method}();