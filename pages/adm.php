<?php
session_start();
require '../includes/conexao.php';

if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
    echo "<script>alert('$msg');</script>";
}

if (!isset($_SESSION['id_cliente']) || $_SESSION['id_cliente'] !== 'admin') {
    echo "<script>
    alert('Você não tem permissão para acessar esta página.');
    window.location.href = '../index.php';
    </script>";
    exit;
}

$titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$preco_min = isset($_GET['preco_min']) ? (float)$_GET['preco_min'] : 0;
$preco_max = isset($_GET['preco_max']) ? (float)$_GET['preco_max'] : 500;

$sql = "
    SELECT v.cd_vinil, v.im_vinil, v.nm_titulo_vinil, v.categoria_vinil, a.nm_artista, v.dt_lancamento_vinil, v.qt_estoque_vinil, v.vl_preco_unitario_vinil 
    FROM vinil AS v 
    JOIN vinil_artista AS va ON v.cd_vinil = va.cd_vinil 
    JOIN artista AS a ON va.cd_artista = a.cd_artista
    WHERE 1=1
";
$params = [];

if ($titulo) {
    $sql .= " AND v.nm_titulo_vinil LIKE :titulo";
    $params[':titulo'] = "%$titulo%";
}

if ($categoria) {
    $sql .= " AND v.categoria_vinil = :categoria";
    $params[':categoria'] = $categoria;
}

if ($preco_min > 0) {
    $sql .= " AND v.vl_preco_unitario_vinil >= :preco_min";
    $params[':preco_min'] = $preco_min;
}

if ($preco_max < 500) {
    $sql .= " AND v.vl_preco_unitario_vinil <= :preco_max";
    $params[':preco_max'] = $preco_max;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$vinis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/deja_vu 1.svg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/adm.css?v=1.0">
    <title>- Administrador -</title>

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
                <li> <button href="#" class="carrinho_compras"><img src="../assets/images/minhas_compras.svg" ><p>Minhas Compras</p></button></li>
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



<div class="table-container">
    <div class="fundo" >
<form method="GET" action="adm.php">
            <div class="filtros">
                <h3>Filtros</h3>
                <label for="titulo" style="display: inline-block;">Nome do Vinil:</label>
               <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>">
                <label for="categoria" style="display: inline-block; margin-left: 1em;">Categoria:</label>
               <select id="categoria" name="categoria">
                    <option value="">Todas</option>
                    <option value="ROCK" <?= $categoria == 'ROCK' ? 'selected' : '' ?>>Rock</option>
                    <option value="POP" <?= $categoria == 'POP' ? 'selected' : '' ?>>Pop</option>
                    <option value="CLÁSSICA" <?= $categoria == 'CLÁSSICA' ? 'selected' : '' ?>>Clássica</option>
                    <option value="HIPHOP" <?= $categoria == 'HIPHOP' ? 'selected' : '' ?>>HipHop</option>
                </select>

                <br><label for="titulo" style="display: inline-block;">Preço Mínimo:</label>
                <input type="number" id="preco_min" name="preco_min" value="<?= htmlspecialchars($preco_min) ?>" min="0" >

                <br> <label for="titulo" style="display: inline-block;">Preço Máximo:</label>
                <input type="number" id="preco_max" name="preco_max" value="<?= htmlspecialchars($preco_max) ?>" min="0" >

                <button type="submit">Aplicar Filtros</button>
            </div>
        </form>
        </div>
        <br>
    <h2>Gerenciar Vinis</h2>
    <a href="cadastrarVinis.php"> <button class="btn" id="btnCadastrar">Cadastrar Novo Vinil</button></a><br>
    <form action="../php/destroy.php" method="POST">
        <button type="submit" class="btn-logout"  style="background-color: var(--vermelho);text-transform: uppercase;color: white; font-weight: 600; padding: 10px; border-radius: 4px;">Sair</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Artista</th>
                <th>Data de Lançamento</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($vinis as $vinil): 
            ?>
                <tr>
                    <td><img src="<?= $vinil['im_vinil']; ?>" alt="Vinil" style="width: 50px; height: 50px;"></td>
                    <td><?= $vinil['nm_titulo_vinil']; ?></td>
                    <td><?= $vinil['categoria_vinil']; ?></td>
                    <td><?= $vinil['nm_artista']; ?></td>
                    <td><?= $vinil['dt_lancamento_vinil']; ?></td>
                    <td><?= $vinil['qt_estoque_vinil']; ?></td>
                    <td>R$ <?= number_format($vinil['vl_preco_unitario_vinil'], 2, ',', '.'); ?></td>
                    <td>
                    <a href="updateVinil.php?vinilId=<?= $vinil['cd_vinil']; ?>">
                     <button class="btnEditar" id="editarVinil">Editar</button>
                         </a>
                         <a href="../php/excluirVinil.php?vinilId=<?= $vinil['cd_vinil']; ?>" onclick="return confirm('Tem certeza que deseja excluir este vinil?')">
                             <button class="btnExcluir">Excluir</button>
                                </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



    <script src="../js/nav.js"></script>
<script src="../js/admModal.js"></script>

</body>
</html>