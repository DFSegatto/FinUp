<?php

namespace App\Router;

class Router {
    private $routes = [];

    public function map($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                return $this->executeHandler($route['handler']);
            }
        }
        
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
    }

    private function executeHandler($handler) {
        list($controller, $method) = explode('@', $handler);
        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass();
        return $controllerInstance->$method();
    }
}