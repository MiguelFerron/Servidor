<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '2606';
$base_de_datos = 'dwes';

// Intenta establecer la conexión a la base de datos
$dwes = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod = $_POST['cod'];
    $nombre_corto = $_POST['nombre_corto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $PVP = $_POST['PVP'];

    $query = "UPDATE producto SET nombre_corto = ?, nombre = ?, descripcion = ?, PVP = ? WHERE cod = ?";
    $stmt = $dwes->prepare($query);
    $stmt->bind_param("ssssd", $nombre_corto, $nombre, $descripcion, $PVP, $cod);

    if ($stmt->execute()) {
        // La actualización se realizó con éxito
        header('Location: listado.php');
        exit();
    } else {
        echo "Error al actualizar el producto: " . $dwes->error;
    }
}

$dwes->close();
?>
