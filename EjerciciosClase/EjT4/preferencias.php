<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Preferencias</title>
    <link rel="stylesheet" type="text/css" href="tarea.css">
</head>
<body>
    <div class="campo">
        <fieldset>
            <legend>Preferencias</legend>
            <?php
            // Verifica si las variables de sesión existen antes de usarlas.
            $idioma = isset($_SESSION["idioma"]) ? $_SESSION["idioma"] : "seleccionar";
            $perfil_publico = isset($_SESSION["perfil_publico"]) ? $_SESSION["perfil_publico"] : "seleccionar";
            $zona_horaria = isset($_SESSION["zona_horaria"]) ? $_SESSION["zona_horaria"] : "seleccionar";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nuevo_idioma = $_POST["idioma"];
                $nuevo_perfil_publico = $_POST["perfil_publico"];
                $nueva_zona_horaria = $_POST["zona_horaria"];
                
                // Verifica si el usuario ha seleccionado valores válidos antes de guardar las preferencias.
                if ($nuevo_idioma !== "seleccionar" && $nuevo_perfil_publico !== "seleccionar" && $nueva_zona_horaria !== "seleccionar") {
                    $_SESSION["idioma"] = $nuevo_idioma;
                    $_SESSION["perfil_publico"] = $nuevo_perfil_publico;
                    $_SESSION["zona_horaria"] = $nueva_zona_horaria;
                    echo "<span class='mensaje'>Información guardada en la sesión</span>";
                } else {
                    echo "<span class='mensaje'>Por favor, selecciona valores válidos antes de guardar las preferencias.</span>";
                }
            }
            ?>

            <form method="post" action="preferencias.php">
                <div class="campo">
                    <label class="etiqueta" for="idioma">Idioma:</label>
                    <select name="idioma" id="idioma">
                        <option value="seleccionar" <?php if ($idioma == "seleccionar") echo "selected"; ?>>Seleccionar</option>
                        <option value="espanol" <?php if ($idioma == "espanol") echo "selected"; ?>>Español</option>
                        <option value="ingles" <?php if ($idioma == "ingles") echo "selected"; ?>>Inglés</option>
                    </select>
                </div>

                <div class="campo">
                    <label class="etiqueta" for="perfil_publico">Perfil público:</label>
                    <select name="perfil_publico" id="perfil_publico">
                        <option value="seleccionar" <?php if ($perfil_publico == "seleccionar") echo "selected"; ?>>Seleccionar</option>
                        <option value="si" <?php if ($perfil_publico == "si") echo "selected"; ?>>Sí</option>
                        <option value="no" <?php if ($perfil_publico == "no") echo "selected"; ?>>No</option>
                    </select>
                </div>

                <div class ="campo">
                    <label class="etiqueta" for="zona_horaria">Zona horaria:</label>
                    <select name="zona_horaria" id="zona_horaria">
                        <option value="seleccionar" <?php if ($zona_horaria == "seleccionar") echo "selected"; ?>>Seleccionar</option>
                        <option value="GMT-2" <?php if ($zona_horaria == "GMT-2") echo "selected"; ?>>GMT-2</option>
                        <option value="GMT-1" <?php if ($zona_horaria == "GMT-1") echo "selected"; ?>>GMT-1</option>
                        <option value="GMT" <?php if ($zona_horaria == "GMT") echo "selected"; ?>>GMT</option>
                        <option value="GMT+1" <?php if ($zona_horaria == "GMT+1") echo "selected"; ?>>GMT+1</option>
                        <option value="GMT+2" <?php if ($zona_horaria == "GMT+2") echo "selected"; ?>>GMT+2</option>
                    </select>
                </div>

                <div class="campo">
                    <input type="submit" value="Establecer preferencias">
                </div>
            </form>

            <a href="mostrar.php">Mostrar preferencias</a>
        </fieldset>
    </div>
</body>
</html>
