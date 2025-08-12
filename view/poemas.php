<?php
require_once '../model/conexao.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $poemaIdVisualizado = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($poemaIdVisualizado) {
        setcookie('ultimo_poema_visualizado_id', $poemaIdVisualizado, time() + (86400 * 30), "/"); // Cookie válido por 30 dias
    }
}
$ultimoPoemaVisualizadoId = $_COOKIE['ultimo_poema_visualizado_id'] ?? '';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POEMAS</title>
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
                    <a href="adicionarPoemas.php" >Adicionar </a>
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
                <h1 class="ficar_no_meio">POEMAS</h1>
                
                <?php
                $queryUsu = "SELECT nomeAutor, novoPoema FROM tabelaPoemas";
                $cadUsuario = $pdo->prepare($queryUsu);
                $cadUsuario->execute();

                //Listando os poemas
                if($cadUsuario->rowCount() != 0)
                {?>
                <?php
                    while($rowTable = $cadUsuario->fetch(PDO::FETCH_ASSOC)){
                        $nomeAutor = $rowTable['nomeAutor'];
                        $novoPoema = $rowTable['novoPoema'];
                        //Garantir para que não venha poemas vazios
                        if(!empty($nomeAutor) && !empty($novoPoema)){
                ?>
                    <div class="poema-card">
                        <div class="poema-card-header">
                            <span class="poema-card-label">Autor:</span> <?php echo htmlspecialchars($nomeAutor);?>
                        </div>
                        <div class="poema-card-header">
                            <span class="poema-card-label">Poema:</span><br>
                            <div class="poema-card-body">
                                <?php echo nl2br(htmlspecialchars($novoPoema));?>
                            </div>
                        </div>
                    </div>
                <?php 
                        } 
                    } 
                ?>
            <?php
                }
                else{
                    echo "</br><p style='color: #F28C8C; text-align: center; margin-bottom: 4px;'>Ainda não há poemas aqui.</p>";
                    echo "<p style='color: #F28C8C; text-align: center;'>Que tal adicionar o primeiro?</p>";
                        echo "<a href='adicionarPoemas.php' class='adicionar-poema-link'>Clique aqui para adicionar seu primeiro poema!</a>";
                }
                ?>                       
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