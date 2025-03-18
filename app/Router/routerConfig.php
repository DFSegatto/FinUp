<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\UsuarioController;
use App\Router\Router;

header('Content-Type: application/json');

// Inicializa a conexão com o banco
$database = new Database();
$db = $database->getConnection();

// Inicializa o router
$router = new Router($db);

// Rotas de usuário
$router->map('GET', '/', 'UsuarioController@index');
$router->map('POST', '/usuario', 'UsuarioController@store');
$router->map('GET', '/usuario/:id', 'UsuarioController@show');
$router->map('PUT', '/usuario/:id', 'UsuarioController@update');
$router->map('DELETE', '/usuario/:id', 'UsuarioController@destroy');

// Executa a rota atual
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);