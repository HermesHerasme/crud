<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->query("SELECT u.*, s.Status FROM USERS u JOIN mSTATUS s ON u.idEstatus = s.idStatus");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <div class="actions">
            <a href="nuevo_usuario.php" class="btn btn-primary">Nuevo Usuario</a>
            <a href="menu.php" class="btn btn-secondary">Volver al Menú</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?php echo $user['ID']; ?></td>
                    <td><?php echo $user['Nombre']; ?></td>
                    <td><?php echo $user['Usuario']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Edad']; ?></td>
                    <td><?php echo $user['Status']; ?></td>
                    <td>
                        <a href="editar_usuario.php?id=<?php echo $user['ID']; ?>" class="btn btn-small btn-edit">Editar</a>
                        <button onclick="confirmarBorrado(<?php echo $user['ID']; ?>)" class="btn btn-small btn-delete">Borrar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="js/main.js"></script>
</body>
</html>