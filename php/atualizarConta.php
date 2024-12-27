<?php
session_start();
require '../includes/conexao.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../pages/paginLoginCadastro.php");
    exit;
}
$cd_cliente = $_SESSION['id_cliente']; 

try{

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    $sql = "SELECT nm_email, nm_usuario, nm_endereco, nm_senha FROM cliente WHERE cd_cliente = :id_cliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $cd_cliente);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($email)) {
            $email = $result['nm_email'];
        }

        if (empty($nome)) {
            $nome = $result['nm_usuario'];
        }

        if (empty($endereco)) {
            $endereco = $result['nm_endereco'];
        }

        if (!empty($senha)) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
        } else {
            $senha = $result['nm_senha']; 
        }


        $sql = "
        UPDATE cliente 
        SET nm_email = :email, nm_usuario = :nome, nm_endereco = :endereco, nm_senha = :senha
        WHERE cd_cliente = :id_cliente
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id_cliente', $cd_cliente);

        if ($stmt->execute()) {
            header("Location: ../pages/minhaConta.php");
        } else {
            echo "<script>alert('Erro ao atualizar os dados.');</script>";
        }
    
}}
    catch (PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }



?>