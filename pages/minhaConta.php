<?php
session_start();
require '../includes/conexao.php'; 


if (!isset($_SESSION['login'])) {
    header("Location: paginLoginCadastro.php");
    exit;
}

$idcliente = $_SESSION['id_cliente']; 

$sqlCliente = "SELECT nm_email, nm_usuario, nm_endereco, cd_cliente FROM cliente WHERE cd_cliente = :id_cliente";
$stmt = $pdo->prepare($sqlCliente);
$stmt->bindParam(':id_cliente', $idcliente);
$stmt->execute();
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlCompras = "
    SELECT 
        p.cd_pagamento, 
        p.dt_pagamento, 
        p.cd_vinil, 
        p.quantidade, 
        p.vl_total_pedido, 
        p.nm_metodo_pagamento
    FROM pagamento_pedido p
    JOIN cliente c ON p.cd_cliente = c.cd_cliente
    WHERE c.cd_cliente = :id_cliente
";
$stmtCompras = $pdo->prepare($sqlCompras);
$stmtCompras->bindParam(':id_cliente', $idcliente);
$stmtCompras->execute();
$compras = $stmtCompras->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../assets/images/minha conta.svg" type="image/x-icon">
   <link rel="stylesheet" href="../css/minhaConta.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Minha Conta</title>
</head>
<body>
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

    <section class="conta">
    
    <div class="containerConta">
   
        <div class="info">
            <h2>Informações do Usuário</h2>
            <p><strong>Email:</strong> <span id="email"><?= htmlspecialchars($cliente['nm_email']) ?></span></p>
            <p><strong>Nome:</strong> <span id="nome"><?= htmlspecialchars($cliente['nm_usuario']) ?></span></p>
            <p><strong>Endereço:</strong> <span id="endereco"><?= htmlspecialchars($cliente['nm_endereco']) ?></span></p>
            <p><strong>Senha:</strong><input type="password" id="senha" value="**********" disabled></p>
            <button class="botao-editar" onclick="abrirModal()">Editar</button>
        </div>
        <div class="imagem">
            <img src="../assets/images/minha conta.svg" alt="Imagem de perfil">
        </div>
    </div>

    <form action="../php/destroy.php" method="POST">
    <button type="submit" class="btn-logout"  style="background-color: var(--vermelho);text-transform: uppercase;color: white; font-weight: 600; padding: 10px; border-radius: 4px;">Sair</button>
    </form>

    <div class="modal" id="modal">
        <div class="modal-conteudo">
            <span class="close" onclick="fecharModal()"><img src="../assets/images/cancelar.svg" alt=""></span>           

            <h3>Editar Informações</h3>
            <form method="POST" action="../php/atualizarConta.php">
            <label for="novo-email">Email:</label>
            <input type="email" id="novo-email" name="email" value="<?= htmlspecialchars($cliente['nm_email']) ?>">
            <label for="novo-nome">Nome:</label>
            <input type="text" id="novo-nome" name="nome"value="<?= htmlspecialchars($cliente['nm_usuario']) ?>">
            <label for="novo-endereco">Endereço:</label>
            <input type="text" id="novo-endereco" name="endereco" value="<?= htmlspecialchars($cliente['nm_endereco']) ?>">
            <label for="nova-senha">Senha:</label>
            <input type="password" id="nova-senha" name="senha" placeholder="**********">
            <br><br>

            <button class="botao-editar" type="submit">Salvar</button>
            </form>

            <form method="POST" action="../php/excluirConta.php">
            <button class="botao-excluir">Excluir Conta</button>
            </form>
        </div>
    </div>
    <br>

<h2>Histórico de Compras</h2>
    <table class="tabela">
        <thead>
            <tr>
                <th>Código Pedido</th>
                <th>Data</th>
                <th>Vinil</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Pagamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= htmlspecialchars($compra['cd_pagamento']) ?></td>
                    <td><?= htmlspecialchars($compra['dt_pagamento']) ?></td>
                    <td><?= htmlspecialchars($compra['cd_vinil']) ?></td>
                    <td><?= htmlspecialchars($compra['quantidade']) ?></td>
                    <td>R$ <?= number_format($compra['vl_total_pedido'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($compra['nm_metodo_pagamento']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
    <script src="../js/nav.js"></script>
    <script src="../js/modalMinhaConta.js"></script>

    
</body>
</html>