<?php
require_once '../controller/editarController.php';

$msg_sucesso = $_SESSION['msg_sucesso'] ?? '';
$msg_erro = $_SESSION['msg_erro'] ?? '';
$msg_info = $_SESSION['msg_info'] ?? '';
unset($_SESSION['msg_sucesso'], $_SESSION['msg_erro'], $_SESSION['msg_info']);

if (isset($_GET['action']) && $_GET['action'] == 'editar' && !empty($_GET['id'])) {
    setcookie('ultimo_poema_editado_id', $_GET['id'], time() + (86400 * 30), "/"); // Cookie válido por 30 dias
}

$ultimoPoemaEditadoId = $_COOKIE ['ultimo_poema_editado_id'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar e Atualizar Poemas</title>
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

        <main class="corpos">
            <h1 class="ficar_no_meio">EDITAR & ATUALIZAR POEMAS</h1>

            <?php 
            if ($msg_sucesso): ?><p id="mensagemSucesso" style="color:green; text-align:center;"><?php echo htmlspecialchars($msg_sucesso); ?></p>
            <script>
                setTimeout(function() {
                    var el = document.getElementById('mensagemSucesso');
                    if (el) el.style.display = 'none';
                }, 10000);
            </script>
            <?php endif; ?>
            <?php if ($msg_erro): ?><p id="mensagemErro" style="color:#F28C8C; text-align: center;"><?php echo htmlspecialchars($msg_erro); ?></p><?php endif; ?>
            <?php if ($msg_info): ?><p style='color: gray; text-align: center;'><?php echo htmlspecialchars($msg_info); ?></p><?php endif; ?>

            <?php if ($poemaParaEditar): // Mostra o formulário de edição se um poema foi carregado pelo Controller ?>
                <div class="corpos">
                <form name="login" action="" method="POST" style="display: flex; flex-direction: column; gap: 12px;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($poemaParaEditar['id']); ?>">
                    <label for="nomeAutor">Autor:</label>
                    <input type="text" name="nomeAutor" id="nomeAutor" placeholder="Nome" onkeyup="somenteLetras(this);" value="<?php echo htmlspecialchars($poemaParaEditar['nomeAutor']); ?>" required>
                    <label for="novoPoema">Poema:</label>
                    <textarea name="novoPoema" id="novoPoema" placeholder="Era uma vez..." rows="5" required><?php echo htmlspecialchars($poemaParaEditar['novoPoema']); ?></textarea>
                    <input type="submit" value="ATUALIZAR" name="AtualizarUsu">
                </form>
                </div>
            <?php endif; ?>

            <?php 
            // Mostra a lista de poemas, usando os dados do Controller
            if (!empty($listaDePoemas)): ?>
                <div class="lista-poemas">
                    <?php foreach ($listaDePoemas as $rowTable): ?>
                            <div class="poema-card">
                                <div class="poema-card-header">
                                    <span class="poema-card-label">Autor:</span> <?php echo htmlspecialchars($rowTable['nomeAutor']);?>
                                </div>
                                <div class="poema-card-header">
                                    <span class="poema-card-label">Poema:</span><br>
                                    <div class="poema-card-body"><?php echo nl2br(htmlspecialchars($rowTable['novoPoema']));?></div>
                                </div>
                                <div style="display: flex; justify-content: center; gap: 18px; margin-top: 18px;">
                                    <a href="editarPoemas.php?action=excluir&id=<?php echo htmlspecialchars($rowTable['id']); ?>" onclick="return confirm('Tem certeza que deseja excluir este poema?');" class="botao-acao botao-excluir">Excluir</a>
                                    <a href="editarPoemas.php?action=editar&id=<?php echo htmlspecialchars($rowTable['id']); ?>" class="botao-acao botao-editar">Editar</a>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div>
            <?php 
            // Se não há poemas e nenhuma outra mensagem, exibe um aviso padrão
            elseif (empty($msg_info) && empty($msg_erro)): ?>
                <p style='color: #F28C8C; text-align: center;'>Não existem registros a serem listados.</p><br>
            <?php endif; ?>

        </main>
        
        <footer id="rodape">
            <p style="width: 100%; text-align: center; margin: 18px 0 12px 0; color: #2E2E2E; font-size: 1.1em;">
                © 2025 Versos e Vozes – Todos os direitos reservados.
            </p>