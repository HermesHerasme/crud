<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM mSTATUS");
$estados = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Nuevo Usuario</h2>
        <form action="procesar_usuario.php" method="POST" class="user-form">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Edad:</label>
                <input type="number" name="edad" required>
            </div>
            <div class="form-group">
                <label>Estado:</label>
                <select name="estado" required>
                    <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado['idStatus']; ?>"><?php echo $estado['Status']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>

