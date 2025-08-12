<?php
session_start(); // Inicia a sessão para recuperar mensagens e dados

include_once('../model/conexao.php'); // Correção de caminho
include_once('../controller/validacoes.php'); // Correção de caminho e a função validarDados está agora no controller

// Recupera dados do formulário se houver erro (para repopular)
$dados = [];
if (isset($_SESSION['dados_formulario'])) {
    $dados = $_SESSION['dados_formulario'];
    unset($_SESSION['dados_formulario']); // Limpa após usar
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/livro.png" type="image/x-icon">
    <script src="../controller/mascara.js" defer></script>
</head>
<body>
    <div class="tudo">    
        <header>
            <nav id="menu">
                <div class="blocos_menus">
                    <a href="inicio2.php" ><img src="img/mao.jpg" alt="icon" style="height: 60px; width: 60px; border-radius: 5px;"></a>
                </div>

                <div class="blocos_menus">
                    <a href="cadastrar.php" >Cadastrar-se</a>
                </div> 
            
                <div class="blocos_menus">
                    <a href="login.php" >Entrar</a>
                </div>
                
               

               
            </nav>
        </header>
        <!------------------------------------------------------------------------------------------------------------------------------------------------>

            <main class="corpos">
                <div class="cadastro-card">
                    <h1 class="ficar_no_meio">CADASTRAR-SE</h1>

                    <?php 
                    // Exibe mensagens de sucesso
                    if (isset($_SESSION['cadastro_sucesso'])) {
                        echo "<p style='color: green; text-align: center;'>" . htmlspecialchars($_SESSION['cadastro_sucesso']) . "</p><br>";
                        unset($_SESSION['cadastro_sucesso']);
                    }
                    // Exibe mensagens de erro gerais
                    if (isset($_SESSION['cadastro_erro'])) {
                        echo "<p style='color: red; text-align: center;'>" . htmlspecialchars($_SESSION['cadastro_erro']) . "</p><br>";
                        unset($_SESSION['cadastro_erro']);
                    }
                    // Exibe erros de validação
                    if (isset($_SESSION['cadastro_erro_validacao'])) {
                        foreach ($_SESSION['cadastro_erro_validacao'] as $erro) {
                            echo "<p style='color: red; text-align: center;'>$erro</p>";
                        }
                        unset($_SESSION['cadastro_erro_validacao']);
                    }
                    ?>

                    <form name="cadastroUsuario" method="post" action="../controller/processa_cadastro.php">
                        <label for="nome">NOME:</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php if(isset($dados['nome'])){echo $dados['nome'];} ?>">

                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" placeholder="Informe seu CPF" maxlength="14" onkeyup="mascaraCPF()" value="<?php if(isset($dados['cpf'])){echo $dados['cpf'];} ?>">

                        <label for="email">EMAIL:</label>
                        <input type="text" name="email" id="email" placeholder="Digite seu email" value="<?php if(isset($dados['email'])){echo $dados['email'];} ?>">

                        <label for="telefone">NÚMERO:</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(00) 00000-0000" onkeyup="mascaraTelefone()"  value="<?php if(isset($dados['telefone'])){echo $dados['telefone'];} ?>">

                        <label for="senha">SENHA:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite uma senha" value="<?php if(isset($dados['senha'])){echo $dados['senha'];} ?>">

                        <input type="submit" value="Cadastrar" name="cadastroFeito" class="botao-acao">
                    </form>
                </div>
            </main>

         <!------------------------------------------------------------------------------------------------------------------------------------------------>
        <footer id="rodape">
            <p style="width: 100%; text-align: center; margin: 18px 0 12px 0; color: #2E2E2E; font-size: 1.1em;">
                © 2025 Versos e Vozes – Todos os direitos reservados.
            </p>
        </footer>


        
    </div>
</body>
</html>