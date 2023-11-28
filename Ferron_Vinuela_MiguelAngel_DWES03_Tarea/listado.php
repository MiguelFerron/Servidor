<?php
$host = 'localhost';
$usuario = 'dwes';
$contrasena = 'abc123';
$base_de_datos = 'dwes';

$selectedFamily = "";  // Inicializa la variable para la familia seleccionada
$selectedFamilyName = "";  // Inicializa la variable para el nombre de la familia

try {
    // Intenta establecer la conexión a la base de datos con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtén la lista de familias desde la base de datos
    $queryFamilias = "SELECT cod, nombre FROM familia";
    $stmtFamilias = $conexion->query($queryFamilias);

    $familias = $stmtFamilias->fetchAll(PDO::FETCH_ASSOC);

    // Procesa la selección de familia y muestra los productos
    $productos = array();  // Inicializa la variable para evitar el "Undefined variable" más adelante
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['familia'])) {
        $selectedFamily = $_POST['familia'];
        
        // Consulta preparada para evitar inyección de SQL
        $queryProductos = "SELECT cod, nombre_corto, PVP FROM producto WHERE familia = :selectedFamily";
        $stmtProductos = $conexion->prepare($queryProductos);
        $stmtProductos->bindParam(':selectedFamily', $selectedFamily);
        $stmtProductos->execute();

        $productos = $stmtProductos->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca el nombre de la familia seleccionada
    foreach ($familias as $familiaItem) {
        if ($familiaItem['cod'] == $selectedFamily) {
            $selectedFamilyName = $familiaItem['nombre'];
            break;
        }
    }

} catch (PDOException $e) {
    // Excepción en caso de fallo en la conexión o consulta
    die("Error en la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Encabezado de la página -->
    <div id="encabezado">
        <h1>Tarea: Listado de productos de una familia</h1>
        
        <!-- Formulario para seleccionar una familia -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="familia">Familia:</label>
            <select name="familia" id="familia">
                <!-- Opción por defecto -->
                <option value="" disabled selected>Selecciona una familia</option>
                
                <?php foreach ($familias as $familiaItem) : ?>
                    <!-- Opciones de familia generadas dinámicamente -->
                    <option value="<?php echo $familiaItem['cod']; ?>"><?php echo $familiaItem['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="mostrar">Mostrar</button>
        </form>
    </div>

    <!-- Contenido principal de la página -->
    <div id="contenido">
        <!-- Mostrar la familia seleccionada -->
        <h2>Familia seleccionada: <?php echo empty($selectedFamilyName) ? 'Seleccione una familia' : $selectedFamilyName; ?></h2>

        <?php if (!empty($selectedFamily) && isset($productos) && count($productos) > 0) : ?>
            <!-- Lista de productos si hay productos disponibles -->
            <h2>Listado de Productos</h2> 
            <?php foreach ($productos as $producto) : ?>
                <div class="producto">
                    <?php echo "Producto " ; ?> <?php  echo $producto['nombre_corto']; ?> - PVP: <?php echo $producto['PVP']; ?>
                    <!-- Formulario para editar el producto -->
                    <form action="editar.php" method="post" style="display: inline;">
                        <input type="hidden" name="producto_id" value="<?php echo $producto['cod']; ?>">
                        <button type="submit" name="editar">Editar</button>
                    </form>
                </div>
                <br> 
            <?php endforeach; ?>
        <?php elseif (empty($selectedFamily) && isset($_POST['mostrar'])) : ?>
            <!-- Mensaje si no se ha seleccionado ninguna familia -->
            <p>Seleccione una familia</p>
        <?php elseif (!empty($selectedFamily) && isset($_POST['mostrar'])) : ?>
            <!-- Mensaje si no hay productos disponibles para la familia seleccionada -->
            <p>No hay productos disponibles para la familia seleccionada.</p>
        <?php endif; ?>
    </div>
</body>
</html>
