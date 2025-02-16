<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM USERS WHERE Usuario = ? AND Password = ? AND idEstatus = 1");
    $stmt->execute([$usuario, $password]);
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_name'] = $user['Nombre'];
        header("Location: menu.php");
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: index.php");
    }
    exit();
}
?>