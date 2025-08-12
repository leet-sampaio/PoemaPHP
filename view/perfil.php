<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL</title>
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
        <!------------------------------------------------------------------------------------------------------------------------------------------------>
        <main class="corpos">
                <h1 class="ficar_no_meio">PERFIL</h1>

                <form action="../view/logout.php" method="post" style="margin-top: 24px;">
                    <input type="submit" value="LOGOUT" class="botao-acao botao-excluir">
                </form>
                
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