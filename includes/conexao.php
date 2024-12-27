<?php
$host = 'localhost:3306';
$dbname = 'db_dejavu';
$username = 'root';
$password = 'usbw';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("Conectado " );

} catch (PDOException $e) {

    error_log("Erro de Conexão: " . $e->getMessage());
}
?>