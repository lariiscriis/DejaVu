<?php
session_start(); // Inicia a sessão
require '../includes/conexao.php'; 

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
    return $total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metodo_pagamento = $_POST['metodo_pagamento'];
    $total = calcularTotal();


    if (isset($_SESSION['id_cliente'])) {
        $cd_cliente = $_SESSION['id_cliente']; 
    } else {
        echo "<script>
         alert('Você precisa estar logado para efetuar uma compra');
        window.location.href = 'paginaLoginCadastro.php';
    </script>";
        exit;
    }

    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        echo "<script>
        alert('Você não pode efetuar compras com a conta de administrador');
        window.location.href = 'adm.php';
    </script>";
        exit;
    }

    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        $sql = "INSERT INTO pagamento_pedido 
                (vl_pagamento, dt_pagamento, nm_metodo_pagamento, vl_total_pedido, cd_cliente, cd_vinil, quantidade) 
                VALUES (?, NOW(), ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $insercoesComSucesso = 0;

        foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
            try {
                $stmt->execute([$total, $metodo_pagamento, $total, $cd_cliente, $produto_id, $quantidade]);
                // echo "<p>Produto $produto_id inserido com sucesso.</p>";
                $insercoesComSucesso++;
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao inserir o produto $produto_id: " . addslashes($e->getMessage()) . "');window.location.href = 'vinis_produtos.php';</script>";
            }
        }

        if ($insercoesComSucesso > 0) {
            echo "<script>
                   alert('Compra realizada com sucesso!');
            window.location.href = 'minhaConta.php';
            </script>";
            unset($_SESSION['carrinho']);
        } else {
            alert('Ocorreu um erro ao processar sua compra. Tente novamente.');
        }
    } else {
        echo "<script>
        alert('Seu carrinho está vazio ou você está usando uma conta de administrador.');
        window.location.href = 'vinis_produtos.php';
    </script>";    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/deja_vu 1.svg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/checkout.css">    
    <title>Checkout</title>
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
                    <li><a href="index.php#home" onclick="menuShow()">Home</a></li>
                    <li><a href="index.php#sobre-nos" onclick="menuShow()">Sobre </a></li>
                    <li><a href="index.php#contato" class="especial2" onclick="menuShow()">Contato</a></li>
                    <li><a href="index.php#cards_generosMusicas" class="especial" onclick="menuShow()">Gêneros</a></li> 
                    <li><a href="artistas.php" onclick="menuShow()">Artistas</a></li>
                    <li><a href="vinis_produtos.php" onclick="menuShow()">Vinis</a></li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="headerCheckout">
        <div class="checkout-header">
            <img src="../assets/images/imagemPersonagens_hero.svg" alt="Checkout">
            <h1>Checkout</h1>
        </div>

    <div class="containerPagamento">        
    <?php
        if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            echo "<table class='tabela-checkout'>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
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
                    </tr>";
                }
            }
            echo "</tbody></table>";
            echo "<div class='resumo-pedido'>
                    <h3>Total: R$ " . calcularTotal() . "</h3>
                    <form method='POST' action='checkout.php'>
                        <div class='form-group'>
                            <label for='nome'>Nome: </label>
                            <input type='text' id='nome' name='nome' placeholder='Digite seu Nome:'required>
                        </div>
                        <div class='form-group'>
                            <label for='endereco'>Endereço: </label>
                            <input type='text' id='endereco' name='endereco'placeholder='Digite seu Endereço:' required>
                        </div>
                    <div class='form-group'>
                    <label for='metodo-pagamento'>Método de Pagamento: </label>
                    <select id='metodo-pagamento' name='metodo_pagamento' class='input-select'>
                        <option value='Cartão De Crédito' selected>Cartão de Crédito</option>
                        <option value='Boleto'>Boleto Bancário</option>
                        <option value='Paypal'>PayPal</option>
                        <option value='Pix'>PIX</option>
                    </select>
                    </div>
                        <button type='submit' class='botao-finalizar'>Finalizar Compra</button>
                    </form>
                </div>";
        } else {
            // echo "<p class='checkout-vazio' style='text-align:center;'>Seu carrinho está vazio.</p>";
        }
        ?>
    </div>


    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Sucesso!</h2>
            <p>Sua compra foi processada.</p>
        </div>
    </div>
</body>
</html>
