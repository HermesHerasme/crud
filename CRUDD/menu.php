<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <nav class="menu">
            <h2>Bienvenido, <?php echo $_SESSION['user_name']; ?></h2>
            <ul>
                <li><a href="usuarios.php">Gestión de Usuarios</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>