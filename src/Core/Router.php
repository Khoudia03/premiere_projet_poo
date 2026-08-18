<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function __construct()
    {
    }

    public function get(string $uri,string $controller,string $method): void {
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function post(string $uri,string $controller,string $method): void {
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch(string $uri,string $method): void {

        $uri = parse_url($uri, PHP_URL_PATH);

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "Page introuvable.";
            return;
        }

        $route = $this->routes[$method][$uri];

        $controllerClass = $route['controller'];

        $controller = new $controllerClass();

        $action = $route['method'];

        if (!method_exists($controller, $action)) {
            http_response_code(500);
            echo "Méthode introuvable.";
            return;
        }

        $controller->$action();
    }
}