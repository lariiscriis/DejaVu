<?php
session_start(); // Inicia a sessão
require '../includes/conexao.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/deja_vu 1.svg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/artistas.css">
    <title> - Artistas -</title>
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

    <!-- cards -->
    <div class="container-cards">
        <?php 
          try { $sql = "
        SELECT 
            a.cd_artista, a.nm_artista, a.nm_website_artista, a.ds_informacao_artista, 
            v.im_vinil
            FROM artista a
            JOIN vinil_artista va ON a.cd_artista = va.cd_artista
            JOIN vinil v ON va.cd_vinil = v.cd_vinil";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $artistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        
        foreach ($artistas as $artista){
            echo "
        <div class='card-artista' data-artista-id='". $artista['cd_artista']."'>
            <img src='". $artista['im_vinil']."'class='imagem-artista'>
            <h3 class='nome-artista'>". $artista['nm_artista']."</h3>
          
        </div>";
          }}  
             catch (PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
        
        ?>
    </div>
=    <!-- Modal -->
    <!-- <div class="modal" id="modalArtista">
        <div class="conteudo-modal">
            <span class="close" onclick="fecharModal()"><img src="assets/images/cancelar.svg" alt=""></span>
            <h2 class="nome-modal" id="nome-modal"> </h2>
            <p class="descricao-modal" id="descricao-modal"> </p>
            <h3 class="vinis-relacionados">Vinis Relacionados</h3><br>

            <div class="itens-relacionados">
                <div class="item-relacionado" id="item-relacionado">
                    <img src="" alt="Vinil" class="imagem-vinil">
                    <p class="nome-vinil"></p>
                </div>
            </div>
        </div>
    </div> fechamento da div container! -->

<script src="../js/artistas.js"></script>
<script src="../js/nav.js"></script>

</body>
</html>
