<?php
include 'modelo/conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID inválido";
    exit;
}

// Obtener datos actuales del usuario
$consulta = $conexion->query("SELECT * FROM usuarios WHERE id_persona = $id");
$usuario = $consulta->fetch_assoc();

if (isset($_POST['btneditar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];

    $sql = $conexion->query("UPDATE usuarios SET 
        nombre='$nombre', 
        apellido='$apellido', 
        dni='$dni', 
        fecha_nac='$fecha', 
        correo='$correo' 
        WHERE id_persona = $id");

    if ($sql) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error al editar: " . $conexion->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Usuario</h2>
    <form method="POST" class="p-4 border rounded bg-light">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= $usuario['apellido'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="text" name="dni" class="form-control" value="<?= $usuario['dni'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha" class="form-control" value="<?= $usuario['fecha_nac'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="<?= $usuario['correo'] ?>" required>
        </div>
        <button type="submit" name="btneditar" class="btn btn-primary">Guardar Cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
