<?php
require '../includes/conexao.php';

if ($_POST) {
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];

    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hashing da senha

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($endereco)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO cliente (nm_email, nm_usuario, nm_senha, nm_endereco) VALUES (:email, :nome, :senha, :endereco)");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->execute();
            
            echo "<script>
            alert('Cadastro Realizado com sucesso! Redirecionando...');
            setTimeout(() => window.location.href = '../pages/paginaLoginCadastro.php');
        </script>";
                    
        exit;  
        } catch (PDOException $e) {
            echo "<script>alert('Ocorreu um erro: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Todos os campos são obrigatórios.');</script>";
    }
}
?>
