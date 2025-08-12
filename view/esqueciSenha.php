<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/livro.png" type="image/x-icon">
    <script src="controller/mascara.js" defer></script>
</head>
<body>
    <div class="tudo">    
        <header>
            <nav id="menu">
                <div class="blocos_menus">
                    <a href="inicio2.php" ><img src="img/mao.jpg" alt="icon" class="logo-menu-img"></a>
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
                <h1 class="ficar_no_meio">Recuperação de senha</h1>

                <?php
                    session_start(); // Inicia a sessão para acessar as mensagens

                    // Verifica e exibe a mensagem de SUCESSO
                    if (isset($_SESSION['reset_mensagem'])) {
                        echo '<p class="success-message">' . htmlspecialchars($_SESSION['reset_mensagem']) . '</p>';
                        unset($_SESSION['reset_mensagem']); // Limpa a mensagem após exibir
                    }

                    // Verifica e exibe a mensagem de ERRO
                    if (isset($_SESSION['reset_erro'])) {
                        echo '<p class="error-message">' . htmlspecialchars($_SESSION['reset_erro']) . '</p>';
                        unset($_SESSION['reset_erro']); // Limpa a mensagem após exibir
                    }
                    ?>

                    <p>Informe seu endereço de e-mail para redefinir sua senha.</p>


                    <form action="../controller/processa_EsqueciSenha.php" method="POST">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                        <input type="submit" value="Redefinir Senha">
                    </form>


                    <p><a href="login.php">Voltar para o Login</a></p>


                
            </main>
        

         <!------------------------------------------------------------------------------------------------------------------------------------------------>
         <p id="frase">
            muito obrigado por visitar o site
        </p>
        <footer id="rodape">
            <p style="width: 100%; text-align: center; margin: 18px 0 12px 0; color: #2E2E2E; font-size: 1.1em;">
                © 2025 Versos e Vozes – Todos os direitos reservados.
            </p>
        </footer>


        
    </div>
</body>
</html>