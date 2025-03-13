<?php

namespace App\Model;

use PDOException;

class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function criarUsuario($cpf, $nome, $email, $password) {
        try {
            $sql = "INSERT INTO usuarios (CPF, nome, email, password) VALUES (:CPF, :nome, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':CPF', $cpf);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarUsuarioPorCPF($cpf) {
        try {
            $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}