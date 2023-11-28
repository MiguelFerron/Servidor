<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$usuario = 'dwes';
$contrasena = 'abc123';
$base_de_datos = 'dwes';

// Verifica si se recibió el ID del producto a editar
if (isset($_POST['producto_id'])) {
    $productoId = $_POST['producto_id'];

    try {
        // Conexión a la base de datos con PDO
        $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtén los datos del producto seleccionado
        $queryProducto = "SELECT * FROM producto WHERE cod = :productoId";
        $stmtProducto = $conexion->prepare($queryProducto);
        $stmtProducto->bindParam(':productoId', $productoId);
        $stmtProducto->execute();
        $producto = $stmtProducto->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Manejo de errores en caso de fallo en la conexión
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
} else {
    // Si no se proporcionó un ID de producto, redirige a la página anterior o a donde sea necesario
    header("Location: listado.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Encabezado de la página -->
<div id="encabezado">
    <h1>Tarea: Edición de un producto</h1>


<!-- Contenido principal de la página -->
<div id="contenido">
    <h2>Editar Producto</h2>

    <!-- Formulario para actualizar el producto -->
    <form action="actualizar.php" method="post">
        <!-- Campo oculto para enviar el ID del producto a actualizar -->
        <input type="hidden" name="producto_id" value="<?php echo $producto['cod']; ?>">

        <!-- Campos para editar la información del producto -->
        <label for="nombre_corto">Nombre Corto:</label>
        <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>"><br>

        <br>

        <label for="nombre">Nombre:</label> <br> <br>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

        <br>

        <label for="descripcion">Descripción:</label> <br> <br>
        <textarea name="descripcion" rows="10"><?php echo $producto['descripcion']; ?></textarea><br>

        <br>

        <label for="pvp">PVP:</label> <br> <br>
        <input type="text" name="pvp" value="<?php echo $producto['PVP']; ?>"><br>

        <br>

        <!-- Botones para actualizar o cancelar la edición -->
        <button type="submit" name="actualizar">Actualizar</button>
        <button type="button" onclick="history.back()">Cancelar</button>
    </form>
</div>

</body>
</html>
