# FinUp - Seu Assistente Financeiro Pessoal 💰

## Sobre o Projeto

FinUp é uma aplicação web moderna desenvolvida para ajudar você a gerenciar suas finanças pessoais de forma inteligente e eficiente. Com uma interface intuitiva e recursos poderosos, o FinUp torna o controle financeiro uma tarefa simples e agradável.

## Funcionalidades Principais 🌟

- **Controle de Despesas**: Registre e categorize seus gastos facilmente
- **Gestão de Receitas**: Acompanhe todas as suas fontes de renda
- **Orçamento Inteligente**: Crie e gerencie orçamentos mensais
- **Metas Financeiras**: Estabeleça e acompanhe suas metas de economia
- **Relatórios Detalhados**: Visualize sua saúde financeira através de gráficos e relatórios
- **Alertas Personalizados**: Receba notificações sobre vencimentos e limites
- **Multiplataforma**: Acesse de qualquer dispositivo através do navegador

## Tecnologias Utilizadas 🚀

- Frontend: HTML, JavaScript
- Backend: PHP
- Banco de Dados: MySQL
- Estilização: Tailwind CSS
- Autenticação: JWT

## Requisitos do Sistema

- PHP 8.0 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/XAMPP)
- Composer (Gerenciador de dependências PHP)
- Navegador web moderno

## Como Iniciar 🏁

1. Clone o repositório para sua pasta htdocs do XAMPP:
```bash
git clone https://github.com/seu-usuario/finup.git C:/xampp/htdocs/FinUp
```

2. Instale as dependências via Composer:
```bash
cd C:/xampp/htdocs/FinUp
composer install
```

3. Configure o banco de dados:
- Inicie o XAMPP e ative o Apache e MySQL
- Acesse o phpMyAdmin (http://localhost/phpmyadmin)
- Crie um novo banco de dados chamado 'finup'
- Importe o arquivo SQL da pasta `database/finup.sql`

4. Configure o arquivo de conexão:
```bash
cp config/database.example.php config/database.php
```
- Edite o arquivo `config/database.php` com suas credenciais do MySQL

5. Acesse o projeto:
```
http://localhost/FinUp
```

## Contribuição 🤝

Contribuições são sempre bem-vindas! Por favor, leia o guia de contribuição antes de submeter suas alterações.

## Licença 📝

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Contato 📧

Para sugestões, dúvidas ou feedback, por favor abra uma issue no repositório ou entre em contato através do email: contato@finup.com

---

Desenvolvido com ❤️ pela equipe FinUp 