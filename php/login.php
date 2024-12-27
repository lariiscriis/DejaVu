<?php
require '../includes/conexao.php'; 
session_start();

$emailp = $_POST['email'];
$senha = $_POST['senha'];

try {
    $sql = "SELECT * FROM cliente";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        if (isset($_POST['remember']) && $_POST['remember'] == '1') {
            setcookie('login', $email, time() + (60 * 60 * 24 * 30), "/");
        } else {
            if (isset($_COOKIE['login'])) {
                setcookie('login', '', time() - 3600, "/");
            }
        }
    }

    if ($emailp == 'adm123@gmail.com' && $senha == '123') {
        $_SESSION['login'] = $emailp;
        $_SESSION['id_cliente'] = 'admin';  
        $_SESSION['tempo_logado'] = time();
        header("Location: ../pages/adm.php");
        exit(); 
    }

    if ($clientes) {
        foreach ($clientes as $cliente) {
            if ($emailp == htmlspecialchars($cliente['nm_email']) && password_verify($senha, $cliente['nm_senha'])) {
                $_SESSION['login'] = $emailp;
                $_SESSION['id_cliente'] = $cliente['cd_cliente'];
                $_SESSION['tempo_logado'] = time();
                
                header("Location: ../pages/minhaConta.php");
                exit();  
            }
        }

        echo "<script type='text/javascript'>
            alert('Login ou Senha incorretos!');
             </script>";
        header("Location: ../pages/paginaLoginCadastro.php");
    }

} catch (PDOException $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
}
?>
