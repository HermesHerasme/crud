<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $estado = $_POST['estado'];

    try {
        $stmt = $pdo->prepare("INSERT INTO USERS (Nombre, Usuario, Password, Email, Edad, idEstatus) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $usuario, $password, $email, $edad, $estado]);
        $_SESSION['success'] = "Usuario creado exitosamente";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Error al crear el usuario: " . $e->getMessage();
    }

    header("Location: usuarios.php");
    exit();
}
?>