<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '2606';
$base_de_datos = 'dwes';

// Intenta establecer la conexión a la base de datos
$dwes = new mysqli($host, $usuario, $contrasena, $base_de_datos);


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $query = "SELECT nombre_corto, nombre, descripcion, PVP FROM producto WHERE cod = ?";
    $stmt = $dwes->prepare($query);
    $stmt->bind_param("s", $cod);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "No se proporcionó un código de producto válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea: Edición de un producto</title>
    <link rel="stylesheet" href="tu_archivo_css.css">
</head>
<body>
    <header id="encabezado">
        <div class="header-container">
            <h1 class="header-title">Tarea: Edición de un producto</h1>
            <nav class="header-nav">
                <!-- Puedes agregar elementos de navegación si es necesario -->
            </nav>
        </div>
    </header>
    <section id="contenido" class="Zona">
        <section class="Zona1">
            <form method="post" action="actualizar.php">
                <label for="nombre_corto">Nombre Corto:</label>
                <br>
                <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>">
                <br>
                <br>
                <label for="nombre">Nombre:</label>
                <br>
                <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>">
                <br>
                <br>
                <label for="descripcion">Descripción:</label>
                <br>
                <textarea name="descripcion" rows="15" cols="50"><?php echo $producto['descripcion']; ?></textarea>
                <br>
                <br>
                <label for="PVP">PVP:</label>
                <br>
                <input type="text" name="PVP" value="<?php echo $producto['PVP']; ?>">
                <input type="hidden" name="cod" value="<?php echo $cod; ?>">
                <br>
                <br>
                <input type="submit" value="Actualizar">
                <a href="listado.php">Cancelar</a>
            </form>
        </section>
    </section>
    <footer id="pie">
        <!-- Puedes agregar contenido adicional en el pie de página si es necesario -->
    </footer>
</body>
</html>