<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Listado</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
    <h1>Tarea: Listado de productos de una familia </h1>
    <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    </form>
    <label for="lista">Familia:</label>
    <select name="lista" id="lista">
        <?php 
            try{

                $enlace = new PDO("mysql: host = localhost ; bdname = dwes", "root", "");
                $enlace->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $enlace -> exec("set character set utf8");
                $listaQuery = "SELECT * FROM familia";

                $result = $enlace -> prepare($listaQuery);

                $result->execute();

                $options = $result->fetchAll(PDO::FETCH_ASSOC);

                $enlace = null;

                foreach ($options as $key => $option) {
                    echo "<option value=\"$option\">$option</option>";
                }   

            }catch(Exception $e){

                die("Error: ".$e->GetMessage());

            }
        ?>
    </select>
    <input type="button" value="Mostar productos" onclick="">
</div>

    

<div id="contenido">
    <h2>Productos de la familia:</h2>
</div>

<div id="pie">
</div>
</body>
</html>
