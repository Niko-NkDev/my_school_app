<?php
//conexion a la base de datos
$conexion = new mysqli("localhost", "root","","my_school_app_db","3306");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener persona de la base de administrador
$resultado = $conexion->query("SELECT * FROM administrador");

if ($resultado->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $persona = array();

    // Obtener cada fila de resultados y agregarla al array
    while ($fila = $resultado->fetch_assoc()) {
        $persona[] = $fila;
    }

    // Enviar los persona como JSON al cliente
    echo json_encode($persona);
} else {
    echo "No hay persona en la base de persona.";
}

$conexion->close();
?>
