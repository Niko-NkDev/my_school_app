<?php
$conexion = new mysqli("localhost", "root","","my_school_app_db","3306");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];


    $stmt = $conexion->prepare("INSERT INTO docente (cedula, nombre, apellido, direccion, telefono, email, asignatura) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('isssiss',$cedula, $nombre, $apellido, $direccion, $telefono, $email, $asignatura);

    if ($stmt->execute()) {
        echo "persona guardados correctamente.";
    } else {
        echo "Error al guardar persona: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
