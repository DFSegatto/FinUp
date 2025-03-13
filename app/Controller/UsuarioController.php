<?php

namespace App\Controller;

use App\Model\Usuario;

class UsuarioController {
    private $usuarioModel;

    public function __construct($conn) {
        $this->usuarioModel = new Usuario($conn);
    }

    public function criarUsuario($cpf, $nome, $email, $password) {
        try {
            if(empty($cpf) || empty($nome) || empty($email) || empty($password)) {
                throw new \Exception("Todos os campos são obrigatórios");
            }

            if($this->usuarioModel->buscarUsuarioPorCPF($cpf)) {
                throw new \Exception("CPF já cadastrado");
            }

            echo json_encode($this->usuarioModel->criarUsuario($cpf, $nome, $email, $password));
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}