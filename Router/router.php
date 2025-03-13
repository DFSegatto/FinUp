<?php

require_once '../vendor/autoload.php';

use App\Controller\UsuarioController;

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$usuarioController = new UsuarioController($db);

$router->map('GET', '/', 'UsuarioController@index');

$router->map('POST', '/usuario', 'UsuarioController@store');

?>