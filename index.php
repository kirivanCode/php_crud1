<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-3">Crud de Usuarios</h1>
    <div class="container-fluid">
        <div class="row">
            <!-- Formulario a la izquierda -->
            <div class="col-md-4 p-3">
                <form action="" method="POST" class="p-4 border rounded bg-light">
                    <h3 class="text-center text-secondary p-2">Registro de usuarios</h3>
                    <?php 
                   include 'modelo/conexion.php';
include 'controlador/registro_persona.php';

                    ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la persona</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido de la persona</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI de la persona</label>
                        <input type="text" class="form-control" name="dni" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnregister" value="ok">Registrar Usuario</button>
                </form>
            </div>
            <!-- Tabla a la derecha -->
            <div class="col-md-8 mt-3 mt-md-0 p-3">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'modelo/conexion.php';
                        // Conexión a la base de datos

                        $sql = $conexion->query("SELECT * FROM usuarios");

                        while ($datos = $sql->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $datos['id_persona'] . "</td>";
                            echo "<td>" . htmlspecialchars($datos['nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($datos['apellido']) . "</td>";
                            echo "<td>" . htmlspecialchars($datos['dni']) . "</td>";
                            echo "<td>" . htmlspecialchars($datos['fecha_nac']) . "</td>";
                            echo "<td>" . htmlspecialchars($datos['correo']) . "</td>";
                            echo "<td>
                                <a href='editar.php?id=" . $datos['id_persona'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='eliminar.php?id=" . $datos['id_persona'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('¿Está seguro de eliminar este usuario?');\">Eliminar</a>
                            </td>";
                            echo "</tr>";
                        }
                        $conexion->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>