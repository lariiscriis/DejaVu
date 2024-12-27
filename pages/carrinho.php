<?php
session_start(); // Inicia a sessão
require '../includes/conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
        $produto_id = $_POST['produto_id'];
        $quantidade = (int)$_POST['quantidade'];

        if ($quantidade > 0) {
            $_SESSION['carrinho'][$produto_id] = $quantidade;
            header('Location: carrinho.php'); 
            exit;
        }
    }

    if (isset($_POST['remover']) && isset($_POST['produto_id'])) {
        $produto_id = $_POST['produto_id'];
        unset($_SESSION['carrinho'][$produto_id]); 
        header('Location: carrinho.php'); 
        exit;
    }
}

function calcularTotal() {
    global $pdo;
    $total = 0;
    
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
            $sql = "SELECT vl_preco_unitario_vinil FROM vinil WHERE cd_vinil = :produto_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':produto_id', $produto_id);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($produto) {
                $total += $produto['vl_preco_unitario_vinil'] * $quantidade;
            }
        }
    }
    return number_format($total, 2, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/minhas_compras.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/carrinho.css">
    <title>Carrinho de Compras</title>
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
                    <li> <a href="
                
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
                    <li> <a href="carrinho.php"><button href="#" class="carrinho_compras"><img src="../assets/images/minhas_compras.svg"><p>Minhas Compras</p></button></li></a>
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

    <div class="containerCarrinho">
        <div class="topo-carrinho">
            <img src="../assets/images/minhas_compras.svg" alt="Carrinho" class="imagem-carrinho">
            <h2 class="titulo-carrinho">Carrinho</h2>
        </div>

        <?php
        if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            echo "<table class='tabela-carrinho'>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
                $sql = "SELECT im_vinil, nm_titulo_vinil, vl_preco_unitario_vinil FROM vinil WHERE cd_vinil = :produto_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':produto_id', $produto_id);
                $stmt->execute();
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($produto) {
                    echo "
                    <tr>
                      <td><img src='" . $produto['im_vinil'] . "' class='imagem-produto'> </td>
                        <td>" . htmlspecialchars($produto['nm_titulo_vinil']) . "</td>
                        <td>" . $quantidade . "</td>
                        <td>R$ " . number_format($produto['vl_preco_unitario_vinil'], 2, ',', '.') . "</td>
                        <td>
                            <form method='POST' action='carrinho.php'>
                                <input type='hidden' name='produto_id' value='" . htmlspecialchars($produto_id) . "'>
                                <button type='submit' name='remover' class='botao-remover'>Remover</button>
                            </form>
                        </td>
                    </tr>";
                }
            }
            echo "</tbody></table>";
            echo "<h3 class='total-carrinho'>Total: R$ " . calcularTotal() . "</h3>";
        } else {
            echo "<p class='carrinho-vazio'>Seu carrinho está vazio.</p>";
        }
        ?>
    <div class="botaoCarrinho">
    <a href="vinis_produtos.php"><button class="botao-voltar">Voltar as Compras</button></a>

        <a href="checkout.php"><button class="botao-finalizar">Finalizar Compra</button></a>
        </div>
    </div>
</body>
</html>
