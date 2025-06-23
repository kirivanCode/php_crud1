<?php
include 'modelo/conexion.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = $conexion->query("DELETE FROM usuarios WHERE id_persona = $id");

    if ($sql) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar: " . $conexion->error . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID no proporcionado</div>";
}
?>
