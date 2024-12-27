<?php
require '../includes/conexao.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $numero_celular = $_POST['numero_celular'];
    $mensagem = $_POST['mensagem'];
    try {

    $pdo->beginTransaction();

    $sql = "INSERT INTO newsletter (nm_cliente_newsletter, nm_email_newsletter, nm_telefone_newsletter, ds_mensagem_newsletter) 
            VALUES (:nome, :email, :numero_celular, :mensagem)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':numero_celular', $numero_celular);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->execute();

    $pdo->commit();

        echo "<script>alert('Mensagem enviada com Sucesso!'); window.location.href = '../index.php';</script>";
    } catch (Exception $e) {

        $pdo->rollBack();
        echo "<p>'Erro ao enviar a mensagem: " . $e->getMessage() . "')</p>";
    }
}

?> 