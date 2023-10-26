<?php
$host = 'nombre_servidor_mysql';
$usuario = 'tu_usuario_mysql';
$contrasena = 'tu_contrasena_mysql';
$base_de_datos = 'tu_base_de_datos';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Realizar una consulta
$query = "SELECT nombre, precio FROM productos WHERE gama = ?";
$gama = "Electrónica";

if ($statement = $conexion->prepare($query)) {
    $statement->bind_param("s", $gama);
    $statement->execute();

    // Recuperar resultados
    $statement->bind_result($nombre, $precio);

    while ($statement->fetch()) {
        echo "Nombre: " . $nombre . ", Precio: " . $precio . "<br>";
    }

    $statement->close();
} else {
    echo "Error en la consulta: " . $conexion->error;
}

$conexion->close();
?>
