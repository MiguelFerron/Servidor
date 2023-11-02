<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejercicio Tema 3: Consultas preparadas en PDO</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    $mensaje = ""; // Inicializa la variable $mensaje

    if (isset($_POST['producto'])) {
        $producto = $_POST['producto'];
    }

    $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "2606");

    if (isset($_POST['actualiz'])) {
        $tienda = $_POST['tienda'];
        $unidades = $_POST['unidades'];

        $sql = "UPDATE stock SET unidades=:unidades WHERE tienda=:tienda AND producto=:producto";
        $consulta = $dwes->prepare($sql);

        for ($i = 0; $i < count($tienda); $i++) {
            $consulta->bindParam(":unidades", $unidades[$i]);
            $consulta->bindParam(":tienda", $tienda[$i]);
            $consulta->bindParam(":producto", $producto);
            $consulta->execute();
        }

        $mensaje = "Se han actualizado los datos.";
    }
    ?>

    <div id="encabezado">
        <h1>Ejercicio: Consultas preparadas en PDO</h1>
        <form id="form_seleccion" action="" method="post">
            <span>Producto: </span>
            <select name="producto">
                <?php
                $sql = "SELECT cod, nombre_corto FROM producto";
                $resultado = $dwes->query($sql);

                if ($resultado) {
                    while ($row = $resultado->fetch()) {
                        echo "<option value='" . $row['cod'] . "'";
                        if (isset($producto) && $producto == $row['cod']) {
                            echo " selected='true'";
                        }
                        echo ">" . $row['nombre_corto'] . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Mostrar stock" name="enviar"/>
        </form>
    </div>

    <div id="contenido">
        <h2>Stock del producto en las tiendas:</h2>
        <?php
        if (isset($producto)) {
            $sql = <<<SQL
            SELECT tienda.cod, tienda.nombre, stock.unidades 
            FROM tienda 
            INNER JOIN stock ON tienda.cod=stock.tienda 
            WHERE stock.producto=:producto
            SQL;
            $consulta = $dwes->prepare($sql);
            $consulta->bindParam(":producto", $producto);
            $consulta->execute();

            $resultado = $consulta->fetchAll();

            if ($resultado) {
                echo '<form id="form_actualiz" action="" method="post">';
                foreach ($resultado as $row) {
                    echo "<input type='hidden' name='producto' value='$producto'/>";
                    echo "<input type='hidden' name='tienda[]' value='" . $row['cod'] . "'/>";
                    echo "<p>Tienda ${row['nombre']}: ";
                    echo "<input type='text' name='unidades[]' size='4' ";
                    echo "value='" . $row['unidades'] . "'/> unidades.</p>";
                }
                echo "<input type='submit' value='Actualizar' name='actualiz'/>";
                echo "</form>";
            }
        }
        ?>
    </div>

    <div id="pie">
        <?php
        echo $mensaje;
        unset($dwes);
        ?>
    </div>
</body>
</html>
