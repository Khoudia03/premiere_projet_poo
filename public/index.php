<?php

use App\Core\Router;

$router = new Router();

require dirname(__DIR__) . '/src/Core/Routes.php';

$router->dispatch(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);