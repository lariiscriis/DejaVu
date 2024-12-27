<?php
session_start();
require '../includes/conexao.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../pages/paginLoginCadastro.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vinilId = $_POST['cd_vinil'];
    $imagem = $_POST['imagem'];
    $titulo = $_POST['titulo'];
    $artista = $_POST['artista'];
    $dataLancamento = $_POST['data_lancamento'];
    $preco = $_POST['preco'];
    $quantidadeEstoque = $_POST['quantidade_estoque'];

    $sql = "
        UPDATE vinil 
        SET im_vinil = :imagem, nm_titulo_vinil = :titulo, dt_lancamento_vinil = :dataLancamento, vl_preco_unitario_vinil = :preco, qt_estoque_vinil = :quantidadeEstoque 
        WHERE cd_vinil = :vinilId
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':imagem', $imagem);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':dataLancamento', $dataLancamento);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidadeEstoque', $quantidadeEstoque);
    $stmt->bindParam(':vinilId', $vinilId);

    if ($stmt->execute()) {
    echo "<script>
        alert('Vinil Atualizado com sucesso!.');
        window.location.href = '../pages/adm.php';
    </script>" ;
  } else {
        echo "<script>
        alert('Erro ao Atualizar Vinil, tente novamente!.');
        window.location.href = '../pages/updateVinil.php';
    </script>";
    }
}
?>