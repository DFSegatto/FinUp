<?php

namespace App\Model;

use PDOException;

class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function criarUsuario($cpf, $nome, $email, $senha) {
        try {
            // Validações básicas
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Email inválido");
            }

            if(strlen($cpf) !== 11) {
                throw new \Exception("CPF deve ter 11 dígitos");
            }

            $sql = "INSERT INTO usuarios (CPF, nome, email, senha) VALUES (:CPF, :nome, :email, :senha)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':CPF', $cpf);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));
            
            if($stmt->execute()) {
                return [
                    'id' => $this->conn->lastInsertId(),
                    'cpf' => $cpf,
                    'nome' => $nome,
                    'email' => $email
                ];
            }
            
            throw new \Exception("Erro ao criar usuário");
        } catch (PDOException $e) {
            throw new \Exception("Erro no banco de dados: " . $e->getMessage());
        }
    }

    public function buscarUsuarioPorCPF($cpf) {
        try {
            $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            
            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $usuario ?: false;
        } catch (PDOException $e) {
            throw new \Exception("Erro ao buscar usuário: " . $e->getMessage());
        }
    }
}