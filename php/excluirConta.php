<?php
session_start();
require '../includes/conexao.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../pages/paginLoginCadastro.php");
    exit;
}

$cd_cliente = $_SESSION['id_cliente']; 
try {
    $sql_pagamento = "DELETE FROM pagamento_pedido WHERE cd_cliente = :cd_cliente";
    $stmt_pagamento = $pdo->prepare($sql_pagamento);
    $stmt_pagamento->bindParam(':cd_cliente', $cd_cliente);
    $stmt_pagamento->execute();

    $sql_cliente = "DELETE FROM cliente WHERE cd_cliente = :cd_cliente";
    $stmt_cliente = $pdo->prepare($sql_cliente);
    $stmt_cliente->bindParam(':cd_cliente', $cd_cliente);
    $stmt_cliente->execute();

    session_unset();
    session_destroy();
    echo "<script>alert('Conta excluída com sucesso!'); window.location.href = '../index.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Erro ao excluir a conta: " . $e->getMessage() . "'); window.location.href = '../pages/minhaConta.php';</script>";
}
?>
