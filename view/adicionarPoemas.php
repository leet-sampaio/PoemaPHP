<?php
session_start();
require_once '../controller/novoPoemaController.php';

if (isset($_POST['nomeAutor']) && !empty($_POST['nomeAutor'])) {
    setcookie('ultimo_autor_adicionado', $_POST['nomeAutor'], time() + (86400 * 30), "/"); // Cookie válido por 30 dias
}

$ultimoAutor = $_COOKIE['ultimo_autor_adicionado'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADICIONAR </title>
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
                    <a href="poemas.php" >Poemas</a>
                </div> 
            
                <div class="blocos_menus">
                    <a href="adicionarPoemas.php" >Adicionar</a>
                </div>
                
                <div class="blocos_menus">
                    <a href="editarPoemas.php">Editar / Atualizar</a>
                </div>

                <div class="blocos_menus">
                    <a href="perfil.php" >Perfil</a>
                </div>

               
            </nav>
        </header>
        <!---------------------------------------------------------------------------------------------------------------------------------------------->

        <body>
            <main class="corpos">
                
                <h1 class="ficar_no_meio">ADICIONAR POEMAS</h1>

                <?php
                if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
                    echo "<p id='mensagemSucesso' style ='color:green; text-align: center;'>Poema cadastrado com sucesso!</p>";
                }
                if(isset($_SESSION['msg_erro'])){
                    echo"<p id='mensagemErro' style= 'color: red; text-align: center;'>" . $_SESSION['msg_erro'] . "</p>";
                    unset($_SESSION['msg_erro']);
                }
                ?>

                <form name="login" action="" method="post" style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nomeAutor">Autor:</label>
                    <input type="text" name="nomeAutor" id="nomeAutor" placeholder="Nome" onkeyup="somenteLetras(this);">
                    <label for="novoPoema">Poema:</label>
                    <textarea name="novoPoema" id="novoPoema" placeholder="Era uma vez..." rows="5"></textarea>
                    <input type="submit" value="SALVAR" name="cadastrarPoema">
                </form>
            </main>
        </body>

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