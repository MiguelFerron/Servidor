<?php

$host = 'localhost';
$usuario = 'dwes';
$contrasena = 'abc123';
$base_de_datos = 'dwes';

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
        $queryProductos = "SELECT cod, nombre_corto, PVP FROM producto WHERE familia = :selectedFamily";
        $stmtProductos = $conexion->prepare($queryProductos);
        $stmtProductos->bindParam(':selectedFamily', $selectedFamily);
        $stmtProductos->execute();

        $productos = $stmtProductos->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
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

    <div id="encabezado">
        <h1>Tarea: Listado de productos de una familia</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="familia">Familia:</label>
            <select name="familia" id="familia">
                <?php foreach ($familias as $familia) : ?>
                    <option value="<?php echo $familia['cod']; ?>"><?php echo $familia['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="mostrar">Mostrar</button>
            </form>
        </div>

        <div id="contenido">
        <?php if (isset($productos) && count($productos) > 0) : ?>
            <h2>Listado de Productos</h2> 
            <?php foreach ($productos as $producto) : ?>
                <div class="producto">
                <?php echo "Producto " ; ?> <?php  echo $producto['nombre_corto']; ?> - PVP: <?php echo $producto['PVP']; ?>
            <form action="editar.php" method="post" style="display: inline;">
             <input type="hidden" name="producto_id" value="<?php echo $producto['cod']; ?>">
             <button type="submit" name="editar">Editar</button>
             </form>
            </div>
            <br> 

            <?php endforeach; ?>
        <?php elseif (isset($_POST['mostrar'])) : ?>
            <p>No hay productos disponibles para la familia seleccionada.</p>
        <?php endif; ?>
    </div>


</body>
</html>

