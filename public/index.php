<?php

use MVC\Courses\Controller\InterfaceControllerRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($path, $routes)){
    http_response_code(404);
    exit();
}

$classController = $routes[$path];
/** @var InterfaceControllerRequest $controller */
$controller = new $classController();
$controller->processRequest();
