<?php
//conexion a la base de datos
$conexion1 = new mysqli("localhost", "root","","my_school_app_db","3306");

if ($conexion1->connect_error) {
    die("Error de conexión: " . $conexion1->connect_error);
}
// llamar a los datos de la tabla
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $asignatura = $_POST['asignatura'];

// conexion con la tabla y la instruccion de UPDATE para editar la informacion
    $stmt = $conexion1->prepare("UPDATE `docente` SET `cedula`=?,`nombre`=?,`apellido`=?,`direccion`=?,`telefono`=?,`email`=?, `asignatura`=? WHERE cedula=?");

    $stmt->bind_param('isssissi',$cedula, $nombre, $apellido, $direccion, $telefono, $email, $asignatura, $cedula);

//redirecciona a la pagina luego de hacer la actualizacion de datos
    if ($stmt->execute()) {
        header("location:/my_school_app/listado_docente/listado_docente.php");
    } else {
        echo "Error al guardar datos: " . $stmt->error;
    }

    $stmt->close();
}

$conexion1->close();
?>
