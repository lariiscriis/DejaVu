<?php
session_start();
require '../includes/conexao.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../pages/paginLoginCadastro.php");
    exit;
}

if (isset($_GET['vinilId'])) {
    $vinilId = $_GET['vinilId'];

    try {
        $pdo->beginTransaction();

        $sql = "DELETE FROM pagamento_pedido WHERE cd_vinil = :vinilId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vinilId', $vinilId);
        $stmt->execute();

        $sql = "DELETE FROM vinil_artista WHERE cd_vinil = :vinilId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vinilId', $vinilId);
        $stmt->execute();

        $sql = "DELETE FROM vinil WHERE cd_vinil = :vinilId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vinilId', $vinilId);
        $stmt->execute();

        $pdo->commit();

        header("Location: ../pages/adm.php?msg=Vinil excluído com sucesso");
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Erro ao excluir o vinil: " . $e->getMessage();
    }
} else {
    echo "ID do vinil não encontrado.";
    exit;
}
?>
