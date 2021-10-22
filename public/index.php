<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($path, $routes)){
    http_response_code(404);
    exit();
}

session_start();

$loginRoute = stripos($path, 'login');
if(!isset($_SESSION['logged']) && $loginRoute === false){
    header('Location: /login');
    return;
}

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, 
    $psr17Factory, 
    $psr17Factory, 
    $psr17Factory 
); 

$serverRequest = $creator->fromGlobals();

$classController = $routes[$path];

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependicies.php';

/** @var  RequestHandleInterface $controller */
$controller = $container->get($classController);
$response = $controller->handle($serverRequest);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
