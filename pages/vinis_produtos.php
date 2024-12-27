<?php
session_start(); 
require '../includes/conexao.php'; 

$generos = isset($_GET['genero']) ? $_GET['genero'] : [];
$preco_max = isset($_GET['preco']) ? (int)$_GET['preco'] : 500;

try {
    $sql = "
    SELECT v.*, a.nm_artista 
    FROM vinil AS v
    JOIN vinil_artista AS va ON v.cd_vinil = va.cd_vinil
    JOIN artista AS a ON va.cd_artista = a.cd_artista
    WHERE 1=1
";
    $params = [];

    if (!empty($generos)) {
        $placeholders = implode(',', array_map(function($index) {
            return ":genero$index";
        }, array_keys($generos)));
        $sql .= " AND categoria_vinil IN ($placeholders)";
        foreach ($generos as $index => $genero) {
            $params[":genero$index"] = $genero;
        }
    }

    if ($preco_max > 0) {
        $sql .= " AND vl_preco_unitario_vinil <= :preco_max";
        $params[':preco_max'] = $preco_max;
    }

 

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/deja_vu 1.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/vinisProdutos.css?v=1.0"> 
    <title>- Vinis -</title>
</head>
<body>

    <header>
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
               <a href="carrinho.php"> <li> <button href="#" class="carrinho_compras"><img src="../assets/images/minhas_compras.svg" ><p>Minhas Compras</p></button></li></a>
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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../index.php#sobre-nos">Sobre </a></li>
                    <li><a href="../index.php#contato" class="especial2">Contato</a></li>
                    <li><a href="../index.php#cards_generosMusicas" class="especial" onclick="menuShow()">Gêneros</a></li> 
                    <li><a href="artistas.php">Artistas</a></li>
                    <li><a href="vinis_produtos.php">Vinis</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!--Filtros para pesquisa, comentário Larissa-->
<div class="containerVinis">
   <div class="fundo">
   <form method="GET" action="vinis_produtos.php">
    <div class="filtros">
        <h3>Filtros</h3>
        <h4>Gênero</h4>
        <input type="checkbox" name="genero[]" id="pop" value="POP">
        <label for="pop" name="genero[]" class="labelfiltro">Pop</label><br>
        <input type="checkbox" name="genero[]" id="rock" value="ROCK">
        <label for="rock" name="genero[]" class="labelfiltro">Rock</label><br>
        <input type="checkbox" name="genero[]" id="hiphop" value="HIPHOP">
        <label for="pop" name="genero[]" class="labelfiltro">Hiphop</label><br>
        <input type="checkbox" name="genero[]" id="classica" value="CLÁSSICA">
        <label for="classica" name="genero[]" class="labelfiltro">Clássica</label><br>

     

        <h4>Preço</h4>
        <input type="range" name="preco" value="0" min="0" max="500"
            oninput="display.value=value" onchange="display.value=value">
            <div class="preco-display">
                <span>R$</span>
                <input type="text" id="display" value="0" readonly>
            </div>
            <button id="filtrar" type="submit">Aplicar Filtros</button>
        </div>
        </form>
    </div>

   <section class="Vinis">
    <div class="produto-cards" style="margin-top: 4em;">
        <?php
        foreach ($produtos as $produto) {
            echo "
            <div class='produto-card'>
                <div class='produto-imagem'>
                    <img src='" . htmlspecialchars($produto['im_vinil']) . "' alt='" . htmlspecialchars($produto['nm_titulo_vinil']) . "'>
                </div>
                <div class='produto-detalhes'>
                    <h3 class='produto-nome'>" . htmlspecialchars($produto['nm_titulo_vinil']) . "</h3>
                    <p class='produto-descricao'>" . htmlspecialchars($produto['ds_informacoes_vinil']) . "</p>
                    <p class='produto-categoria'><strong>Categoria:</strong><span class='cat'> " . htmlspecialchars($produto['categoria_vinil']) . "</span></p>
                    <p class='produto-artista'><strong>Artista:</strong><span class='art'> " . htmlspecialchars($produto['nm_artista']) . "</span></p>
                    <p class='produto-preco'><strong> R$" . number_format($produto['vl_preco_unitario_vinil'], 2, ',', '.') . "</strong></p>
                    <div class='produto-avaliacao'>
                        <img src='../assets/images/estrela_generos.svg' alt='Estrela cheia'>
                        <img src='../assets/images/estrela_generos.svg' alt='Estrela cheia'>
                        <img src='../assets/images/estrela_generos.svg' alt='Estrela cheia'>
                        <img src='../assets/images/estrela_generos.svg' alt='Estrela cheia'>
                        <img src='../assets/images/estrela_generos.svg' alt='Estrela cheia'>
                        <span>(5)</span>
                    </div>
                    <div class='produto-botoes'>
                        <button class='btn-comprar' 
                            id='btn-comprar' 
                            onclick='abrirModal(
                                \"" . addslashes($produto['nm_titulo_vinil']) . "\", 
                                \"" . addslashes($produto['vl_preco_unitario_vinil']) . "\", 
                                \"" . addslashes($produto['ds_informacoes_vinil']) . "\", 
                                \"" . addslashes($produto['categoria_vinil']) . "\", 
                                \"" . addslashes($produto['nm_artista']) . "\", 
                                \"" . addslashes($produto['im_vinil']) . "\", 
                                \"" . addslashes($produto['cd_vinil']) . "\")'>
                            Adicionar ao Carrinho 
                        </button>
                        <button class='btn-favoritar'><img src='../assets/images/favoritar.png' alt='Favoritar'></button>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</section>





<!-- Modal -->
<div id="modal" class="modal">
    <div class="conteudo-modal">
    <div class="modal-esquerda">
            <img id="imagem-modal" src="" alt="Vinil" class="imagem-modal">
        </div>
        <div class="modal-direita">
        <span class="close" id="close" onclick="fecharModal()"><img src="../assets/images/cancelar.svg" alt=""></span>

            <div class="nome-preco-container">
            <h2 id="nome-modal"></h2>
            <p><span id="preco-modal"></span></p>
            </div>

            <p><span id="descricao-modal"></span></p>
            
            <div class="info-container">
            <p class="nome_l"> <strong>Categoria:</strong> <span id="categoria-modal"></span></p>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" min="1" value="1">        
            </div>

            <div class="quantidade-container">
            <p class="nome_l"><strong>Artista:</strong> <span id="artista-modal"></span></p>

            </div>
            <form id="form-carrinho" method="POST" action="carrinho.php">
                <input type="hidden" name="produto_id" id="produto-id"> 
                <input type="hidden" name="quantidade" id="quantidade-form"> 
                <button type="submit" id="adicionar-carrinho" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
            </form>
        </div>
    </div>
</div>




<script src="../js/nav.js"></script>
<script src="../js/modalProdutos.js"></script>



    
</body>
</html>