<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="dwes.css">
</head>
<body>

    <!-- Contenido principal de la página -->
    <div id="encabezado">
    <h1>Tarea: Actualizar contenido</h1>
    </div>

        <?php
        // Configuración de la base de datos
        $host = 'localhost';
        $usuario = 'dwes';
        $contrasena = 'abc123';
        $base_de_datos = 'dwes';

        // Verifica si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verifica si se ha pulsado el botón "Actualizar"
            if (isset($_POST['actualizar'])) {
                // Recupera los datos del formulario
                $productoId = $_POST['producto_id'];
                $nombreCorto = $_POST['nombre_corto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $pvp = $_POST['pvp'];

                try {
                    // Conexión a la base de datos con PDO
                    $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $contrasena);
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Actualiza los datos del producto
                    $query = "UPDATE producto SET nombre_corto = ?, nombre = ?, descripcion = ?, PVP = ? WHERE cod = ?";
                    $stmt = $conexion->prepare($query);
                    $stmt->execute([$nombreCorto, $nombre, $descripcion, $pvp, $productoId]);
                } catch (PDOException $e) {
                    // Manejo de errores en caso de fallo en la conexión
                    die("Error de conexión a la base de datos: " . $e->getMessage());
                }

                // Mensaje de éxito
                echo "<p>Se han actualizado los datos</p>";
            }
        }
        ?>

        <!-- Formulario de retorno al listado -->
        <form action="listado.php" method="post">
            <button type="submit" name="volver">Volver al Listado</button>
        </form>
    </div>
    
</body>
</html>
