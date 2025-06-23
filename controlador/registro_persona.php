<?php 
if(!empty($_POST['btnregister'])){
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['fecha']) && !empty($_POST['correo'])) {
       

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];

        // Preparar la consulta SQL para insertar los datos
        $sql = $conexion->query("INSERT INTO usuarios (nombre, apellido, dni, fecha_nac, correo) VALUES ('$nombre', '$apellido', '$dni', '$fecha', '$correo')");
        if ($sql) {
            echo "<div class='alert alert-success'>Usuario registrado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al registrar el usuario: " . $conexion->error . "</div>";

        }
}
   
}
?>