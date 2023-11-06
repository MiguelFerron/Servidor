<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '2606';
$base_de_datos = 'dwes';

// Intenta establecer la conexión a la base de datos
$dwes = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verifica si hay un error de conexión
if ($dwes->connect_error) {
    die("Error de conexión a la base de datos: " . $dwes->connect_error);
}

// Obtén la lista de familias desde la base de datos
$query = "SELECT cod, nombre FROM familia";
$result = $dwes->query($query);

if (!$result) {
    die("Error al obtener las familias: " . $dwes->error);
}

$familias = array();
while ($row = $result->fetch_assoc()) {
    $familias[] = $row;
}

// Procesa la selección de familia y muestra los productos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedFamily = $_POST['familia'];
    $query = "SELECT cod, nombre_corto, PVP FROM producto WHERE familia = ?";
    $stmt = $dwes->prepare($query);
    $stmt->bind_param("s", $selectedFamily);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Error al obtener los productos: " . $dwes->error);
    }

    $productos = array();
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tarea: Listado de productos de una familia</title>
    <link rel="stylesheet" href="ejercicio.css">
</head>
<body>
<header id="sticky-header" class="header">
        <div class="header-container">
            <h1 class="header-title">Tarea: Listado de productos de una familia</h1>
            <nav class="header-nav">

            </nav>
        </div>
    </header>
    <section class="Zona">
        <section class="Zona1">
    
    <form method="post">
        <label for="familia">Selecciona una familia:</label>
        <select name="familia" id="familia">
            <?php foreach ($familias as $familia) : ?>
                <option value="<?php echo $familia['cod']; ?>"><?php echo $familia['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar productos">
    </form>

    <?php if (isset($productos)) : ?>
        <h2>Productos de la familia</h2>
        <ul>
            <?php foreach ($productos as $producto) : ?>
                
                    <br>
                    <?php echo $producto['nombre_corto']; ?> - PVP: <?php echo $producto['PVP']; ?>
                    <a href="editar.php?cod=<?php echo $producto['cod']; ?>">Editar</a>
                    <br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </section>
    </section>

</body>
</html>
