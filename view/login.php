<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                

                <?php 
                    session_start();

                    $dados = []; // Inicializa a variável para evitar "undefined variable"
                    if(isset($_SESSION['dados_login'])){
                        $dados = $_SESSION['dados_login'];
                        unset($_SESSION['dados_login']); // Limpa os dados da sessão após recuperá-los
                    }

                    // Verifica e exibe a mensagem de erro (use 'login_error' consistentemente)
                    if(isset($_SESSION['login_erro'])){
                        echo '<p> ' . htmlspecialchars($_SESSION['login_erro']) . ' </p>'; // Use htmlspecialchars
                        unset($_SESSION['login_erro']); // Limpa a mensagem de erro da sessão
                    }
                    ?>
            <div class="cadastro-card">
                <h1 class="ficar_no_meio">LOGIN</h1>
                    <form name="login" method="post" action="../controller/processa_login.php">
                        <LABEL>EMAIL: </LABEL>
                        <input type="text" name="email" id="emailLogin" placeholder="*******@*****.***" value="<?php if(isset($dados['emailLogin'])){echo htmlspecialchars($dados['emailLogin']);} ?>">
                        <br><br>
                        <LABEL>SENHA: </LABEL>
                        <input type="password" name="senha" id="senhaLogin" placeholder="************" value=""> 
                        <br><br>
                        <input type="submit" value="Entrar" name="loginFeito" class="botao-acao">
                        <p><a href="esqueciSenha.php">Esqueci minha senha</a></p>
                        <br><br>
                        <p>Ainda não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
                </form>
                </div>
            </main>
        

         <!------------------------------------------------------------------------------------------------------------------------------------------------>
         
        <footer id="rodape">
            <p style="width: 100%; text-align: center; margin: 18px 0 12px 0; color: #2E2E2E; font-size: 1.1em;">
                © 2025 Versos e Vozes – Todos os direitos reservados.
            </p>
        </footer>


        <script src="js/javaScript.js"></script>
    </div>
</body>
</html>