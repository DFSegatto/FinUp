<?php

namespace App\Controller;

use App\Model\Usuario;

class UsuarioController {
    private $usuarioModel;

    public function __construct($conn) {
        $this->usuarioModel = new Usuario($conn);
    }

    public function index() {
        // Renderiza a view de cadastro
        require_once __DIR__ . '/../View/usuario/cadastro.php';
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            return json_encode(['error' => 'Método não permitido']);
        }

        $data = json_decode(file_get_contents('php://input'), true);
        
        try {
            // Validações básicas
            if(empty($data['cpf']) || empty($data['nome']) || empty($data['email']) || empty($data['senha'])) {
                throw new \Exception("Todos os campos são obrigatórios");
            }

            // Validação de força da senha
            if(strlen($data['senha']) < 8) {
                throw new \Exception("A senha deve ter no mínimo 8 caracteres");
            }

            // Verifica se CPF já existe
            if($this->usuarioModel->buscarUsuarioPorCPF($data['cpf'])) {
                throw new \Exception("CPF já cadastrado");
            }

            // Cria o usuário
            $usuario = $this->usuarioModel->criarUsuario(
                $data['cpf'],
                $data['nome'],
                $data['email'],
                $data['senha']
            );

            // Log de sucesso
            error_log("Usuário criado com sucesso: {$data['email']}");

            return json_encode([
                'success' => true,
                'message' => 'Usuário criado com sucesso',
                'data' => $usuario
            ]);

        } catch (\Exception $e) {
            // Log de erro
            error_log("Erro ao criar usuário: " . $e->getMessage());
            
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}