<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Mostrar</title>
    <link rel="stylesheet" type="text/css" href="tarea.css"></head>
<body>
    <div class="campo">
        <fieldset>
            <legend>Preferencias</legend>
            <?php
            if (isset($_SESSION["idioma"]) && isset($_SESSION["perfil_publico"]) && isset($_SESSION["zona_horaria"])) {
                echo "<p>Idioma: " . $_SESSION["idioma"] . "</p>";
                echo "<p>Perfil público: " . $_SESSION["perfil_publico"] . "</p>";
                echo "<p>Zona horaria: " . $_SESSION["zona_horaria"] . "</p>";
            }
            ?>

            <form method="post" action="mostrar.php">
                <div class="campo">
                    <input type="submit" name="borrar" value="Borrar preferencias">
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["borrar"])) {
            // Si se ha enviado un formulario para borrar preferencias, elimina las variables de sesión.
              session_unset();
            echo "<span class='mensaje'>Información de la sesión eliminada</span>";
}
?>
            <a href="preferencias.php">Establecer preferencias</a>
        </fieldset>
    </div>
</body>
</html>
