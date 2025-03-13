<html>
    <head>
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <h1>Cadastro de Usuário</h1>
        <form action="app/Controller/UsuarioController.php" method="post" onsubmit="return validarFormulario()">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Cadastrar</button>
        </form>
    </body>
    <script>
        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if(cpf.length !== 11) return false;
            return true;
        }

        function validarEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function validarFormulario() {
            const cpf = document.getElementById('cpf').value;
            const email = document.getElementById('email').value;

            if(!validarCPF(cpf)) {
                alert('CPF inválido');
                return false;
            }

            if(!validarEmail(email)) {
                alert('Email inválido');
                return false;
            }

            return true;
        } 
    </script>
</html>
