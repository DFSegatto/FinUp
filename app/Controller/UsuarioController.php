<?php

namespace App\Controller;

use App\Model\Usuario;

class UsuarioController {
    private $usuarioModel;

    public function __construct($conn) {
        $this->usuarioModel = new Usuario($conn);
    }

    public function criarUsuario($cpf, $nome, $email, $password) {
        if(empty($cpf) || empty($nome) || empty($email) || empty($password)) {
            throw new \Exception("Todos os campos são obrigatórios");
        }
        return $this->usuarioModel->criarUsuario($cpf, $nome, $email, $password);
    }
}