<?php
$host = 'nombre_servidor_mysql';
$usuario = 'tu_usuario_mysql';
$contrasena = 'tu_contrasena_mysql';
$base_de_datos = 'tu_base_de_datos';

try {
    $dwes = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $contrasena);
    $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtén la lista de familias desde la base de datos
    $query = "SELECT cod, nombre FROM familia";
    $result = $dwes->query($query);

    if (!$result) {
        die("Error al obtener las familias: " . $dwes->errorInfo()[2]);
    }

    $familias = $result->fetchAll(PDO::FETCH_ASSOC);

    // Procesa la selección de familia y muestra los productos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedFamily = $_POST['familia'];
        $query = "SELECT cod, nombre_corto, PVP FROM producto WHERE familia = :selectedFamily";
        $stmt = $dwes->prepare($query);
        $stmt->bindParam(':selectedFamily', $selectedFamily, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            die("Error al obtener los productos: " . $dwes->errorInfo()[2]);
        }

        $productos = $result;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>