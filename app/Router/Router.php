<?php

namespace App\Router;

class Router {
    private $routes = [];
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

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
        return json_encode(['error' => 'Rota não encontrada']);
    }

    private function executeHandler($handler) {
        list($controller, $method) = explode('@', $handler);
        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass($this->db);
        return $controllerInstance->$method();
    }
}
