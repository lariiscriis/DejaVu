<?php
require '../includes/conexao.php'; 
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['login'])) {
    header("Location: paginLoginCadastro.php");
    exit;
}

$vinilId = isset($_GET['vinilId']) ? $_GET['vinilId'] : null;

if ($vinilId) {
    $sql = "
        SELECT 
            v.im_vinil, 
            v.nm_titulo_vinil, 
            v.cd_vinil, 
            a.nm_artista, 
            v.dt_lancamento_vinil, 
            v.qt_estoque_vinil, 
            v.vl_preco_unitario_vinil
        FROM vinil v
        JOIN vinil_artista va ON v.cd_vinil = va.cd_vinil
        JOIN artista a ON va.cd_artista = a.cd_artista
        WHERE v.cd_vinil = :vinilId
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':vinilId', $vinilId);
    $stmt->execute();
    $vinil = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vinil) {
        echo "Vinil não encontrado.";
        exit;
    }
} else {
    echo "ID do vinil não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/deja_vu 1.svg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/updateVinis.css">
    <title>- Vinis Cadastrados - </title>
</head>
<body>
    <!-- nav -->
<header id="home">
    <div class="top">
        <div class="container">
            <ul class="lang">
                <div class="sociais">
                <li><a href="#"><img src="../assets/images/redes1.svg"></a></li>
                <li><a href="#"><img src="../assets/images/redes2.svg"></a></li>
                <li><a href="#"><img src="../assets/images/redes3.svg"></a></li>
            </div> 
                <div class="barra_pesquisa">
                <form method="GET" action="pesquisa.php">
                      <li>   
                    <input type="search" class="input_pesquisa" name="query" placeholder="Ache o seu vinil favorito: (vinil, artista, gênero...)">
                    <button type="submit" class="botao_pesquisa"><img src="../assets/images/pesquisa_img.svg" alt=""></button>
                    </li>
                    </form>
                 </div>
            </ul>
            <div class="botao_container">
            <ul class="botoes_user">
            <li> 
                <a href="
                
                <?php
                            if (isset($_SESSION['id_cliente'])) {
                                if ($_SESSION['id_cliente'] === 'admin') {
                                    echo 'adm.php';
                                } else {
                                    echo 'minhaConta.php';
                                }
                            } else {
                                echo 'paginaLoginCadastro.php';
                            }
                        ?>">
                            <button class="perfil_usuario">
                                <img src="../assets/images/minha conta.svg">
                                <p>Minha Conta</p>
                            </button>
                        </a>
                </li>
            <li> <a href="carrinho.php"><button href="#" class="carrinho_compras"><img src="../assets/images/minhas_compras.svg" ><p>Minhas Compras</p></button></li></a>
                </ul>
            </div>
        </div>
    </div>
    <nav>
        <div class="container_nav">
            <a href="" class="logo">
                <img src="../assets/images/deja_vu 1.svg" >
            </a>
            <div class="menu-btn">
                <img src="../assets/images/barraDeMenu.svg" class="menuHamburguer" onclick="menuShow()"></label>
            </div>
            <ul class="menuLista" >
                <li><a href="../index.php#home" onclick="menuShow()">Home</a></li>
                <li><a href="../index.php#sobre-nos" onclick="menuShow()">Sobre </a></li>
                <li><a href="../index.php#contato" class="especial2" onclick="menuShow()">Contato</a></li>
                <li><a href="../index.php#cards_generosMusicas" class="especial" onclick="menuShow()">Gêneros</a></li> 
                <li><a href="artistas.php" onclick="menuShow()">Artistas</a></li>
                <li><a href="vinis_produtos.php" onclick="menuShow()">Vinis</a></li>
            </ul>
        </div>
    </nav>
</header>

<section id="contato">
    <div class="contato-form">
        <h2>Editar Vinil</h2>
        <form action="../php/atualizarVinil.php" method="post">
    <input type="hidden" name="cd_vinil" value="<?= $vinil['cd_vinil'] ?>">

    <label for="imagem">Imagem do Vinil:</label>
    <input type="text" id="imagem" name="imagem" value="<?= $vinil['im_vinil'] ?>" placeholder="Digite o endereço da imagem" required>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?= $vinil['nm_titulo_vinil'] ?>" placeholder="Digite o título do vinil" required>

    <label for="artista">Artista:</label>
    <input type="text" id="artista" name="artista" value="<?= $vinil['nm_artista'] ?>" placeholder="Digite o nome do artista" required>

    <label for="data_lancamento">Data de Lançamento:</label>
    <input type="text" id="data_lancamento" name="data_lancamento" value="<?= $vinil['dt_lancamento_vinil'] ?>" required>

    <label for="preco">Preço (R$):</label>
    <input type="number" id="preco" name="preco" step="0.01" value="<?= $vinil['vl_preco_unitario_vinil'] ?>" placeholder="Digite o preço" required>

    <label for="quantidade_estoque">Quantidade em Estoque: </label>
    <input type="number" id="quantidade_estoque" name="quantidade_estoque" value="<?= $vinil['qt_estoque_vinil'] ?>" placeholder="Digite a quantidade" required>

    <button type="submit">Salvar Alterações</button>
</form><br>
<a href="adm.php"><button style="background-color: #00995E;">Voltar</button></a>

    </div>

    <div class="contato-imagem">
        <img src="../assets/images/imagemPersonagens_hero.svg" alt="Personagem">
    </div>
</section>

<script src="../js/nav.js"></script>

</body>
</html>