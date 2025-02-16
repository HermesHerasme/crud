<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

try {
    // En lugar de borrar, actualizamos el estado a 'Borrado' (3)
    $stmt = $pdo->prepare("UPDATE USERS SET idEstatus = 3 WHERE ID = ?");
    $stmt->execute([$id]);

    $_SESSION['success'] = "Usuario eliminado correctamente"; // Mensaje de éxito
} catch(PDOException $e) {
    $_SESSION['error'] = "Error al eliminar el usuario: " . $e->getMessage(); // Mensaje de error
}

header("Location: usuarios.php"); // Redirige a la página de gestión de usuarios
exit();
?>