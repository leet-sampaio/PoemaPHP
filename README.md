## 🖥️ Detalhes do Backend

O backend do PoemaPHP foi desenvolvido em PHP puro, seguindo rigorosamente o padrão de arquitetura MVC (Model-View-Controller), o que garante separação de responsabilidades, organização e facilidade de manutenção. Veja como cada parte funciona:

- **Model:**
	- Responsável por toda a comunicação com o banco de dados MySQL.
	- Os arquivos em `model/` (como `conexao.php` e `editarPoema.php`) fazem a conexão, executam queries SQL e retornam dados para o restante do sistema.
	- Utiliza PDO ou MySQLi para evitar SQL Injection e garantir segurança nas operações.

- **Controller:**
	- Os arquivos em `controller/` recebem as requisições dos formulários (cadastro, login, CRUD de poemas, etc.).
	- Realizam validações, sanitização de dados e regras de negócio.
	- Controlam o fluxo de navegação, redirecionando o usuário conforme o resultado das operações.
	- Manipulam sessões PHP para autenticação e controle de acesso.
	- Exemplo: `processa_login.php` valida o login, inicia a sessão e direciona para a página principal.

- **View:**
	- Os arquivos em `view/` são responsáveis pela interface com o usuário.
	- Recebem dados do Controller e exibem de forma organizada, utilizando HTML, CSS e JavaScript.

- **Segurança:**
	- Todas as entradas de usuário são validadas e sanitizadas.
	- As senhas são armazenadas de forma segura (utilize funções como `password_hash` e `password_verify`).
	- O sistema utiliza sessões para garantir que apenas usuários autenticados possam acessar as áreas protegidas.

- **Integração com MySQL:**
	- O banco de dados é modelado no MySQL Workbench e acessado via PHP.
	- O script `sql.sql` permite criar toda a estrutura do banco facilmente.

Essa abordagem torna o sistema robusto, seguro e fácil de evoluir, permitindo a adição de novas funcionalidades sem comprometer a organização do código.

# PoemaPHP

Sistema completo para cadastro, login e gerenciamento de poemas, desenvolvido em PHP seguindo o padrão MVC, com banco de dados MySQL e interface moderna.

## ✨ Descrição Geral
O PoemaPHP é um sistema web onde usuários podem se cadastrar, fazer login e interagir com poemas. Após autenticação, é possível criar, visualizar, editar e excluir poemas. O sistema foi projetado para ser didático, organizado e fácil de instalar.

## 🚦 Fluxo do Usuário
1. **Cadastro/Login:**
	- O usuário acessa a página inicial e pode escolher entre cadastrar-se ou fazer login.
2. **Autenticação:**
	- Após o cadastro, o usuário pode fazer login com seu e-mail e senha.
3. **Página Principal:**
	- Usuário autenticado é direcionado à página principal, onde pode:
	  - Visualizar todos os poemas cadastrados.
	  - Criar novos poemas.
	  - Editar ou excluir seus próprios poemas.
	  - Visualizar detalhes de cada poema.
4. **Logout:**
	- O usuário pode sair do sistema a qualquer momento.

## 🛠️ Tecnologias Utilizadas
- **Backend:** PHP (MVC)
- **Frontend:** HTML5, CSS3, JavaScript
- **Banco de Dados:** MySQL (modelado e administrado via MySQL Workbench)
- **Servidor Local:** XAMPP, WAMP, Laragon ou similar

## 📁 Estrutura de Pastas (MVC)
```
PoemaPHP/
│
├── controller/         # Lógica de controle e validações
│   ├── editarController.php
│   ├── novoPoemaController.php
│   ├── processa_cadastro.php
│   ├── processa_login.php
│   ├── processa_EsqueciSenha.php
│   ├── validacoes.php
│   ├── validacoesPoema.php
│   └── mascara.js
│
├── model/              # Acesso ao banco de dados e regras de negócio
│   ├── conexao.php
│   └── editarPoema.php
│
├── view/               # Páginas e recursos visuais
│   ├── adicionarPoemas.php
│   ├── cadastrar.php
│   ├── editarPoemas.php
│   ├── esqueciSenha.php
│   ├── inicio.php
│   ├── inicio2.php
│   ├── login.php
│   ├── perfil.php
│   ├── poemas.php
│   └── css/
│       └── style.css
│   └── img/
│       ├── facebook.png
│       ├── instagram.png
│       ├── livro.png
│       └── mao.jpg
│
├── sql.sql             # Script para criação do banco de dados
├── README.md           # Este arquivo
└── ...
```

## ⚙️ Instalação e Execução
### Pré-requisitos
- PHP 7.4+
- Servidor local (XAMPP, WAMP, Laragon, etc.)
- MySQL Server
- MySQL Workbench (opcional, para modelagem)

### Passos para rodar o projeto
1. **Clone o repositório:**
	```
	git clone https://github.com/seu-usuario/PoemaPHP.git
	```
2. **Coloque a pasta do projeto em seu diretório do servidor local:**
	- Exemplo: `C:/xampp/htdocs/PoemaPHP`
3. **Crie o banco de dados:**
	- Importe o arquivo `sql.sql` no MySQL (via phpMyAdmin ou MySQL Workbench).
4. **Configure a conexão com o banco:**
	- Edite `model/conexao.php` com os dados do seu MySQL (host, usuário, senha, banco).
5. **Inicie o servidor local:**
	- Exemplo (XAMPP): Inicie Apache e MySQL.
6. **Acesse o sistema:**
	- No navegador, acesse: `http://localhost/PoemaPHP/view/login.php`

## 💡 Exemplos de Uso
- **Cadastro:**
  - Preencha o formulário de cadastro e crie sua conta.
- **Login:**
  - Entre com seu e-mail e senha cadastrados.
- **Adicionar Poema:**
  - Após login, clique em "Adicionar Poema", preencha o título e o texto, e salve.
- **Editar/Excluir Poema:**
  - Na lista de poemas, utilize os botões de editar ou excluir ao lado de cada poema.
- **Logout:**
  - Clique em "Sair" para encerrar a sessão.

## 📌 Observações
- O sistema utiliza sessões PHP para autenticação.
- Todas as operações de CRUD são protegidas e validadas.
- O layout é responsivo e pode ser customizado em `view/css/style.css`.

---

Desenvolvido para fins didáticos e como exemplo de aplicação web PHP com MVC.
