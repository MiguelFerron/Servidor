<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style></style>

    <title>Prueba</title>
</head>
<body>
    <header id="sticky-header" class="header">
        <div class="header-container">
            <h1 class="header-title">EJERCICIO AGENDA Miguel Ángel Ferrón Viñuela</h1>
            <nav class="header-nav">

            </nav>
        </div>
    </header>
    <section class="Zona">
        <section class="Zona1">
            <h2>Agenda</h2>
           
            <form method="POST" class="registro">
                <!--Reguistro del contacto-->
                <div class="zonaRegistro">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="input-style">
                </div>
                <div class="zonaRegistro">
                    <label for="numero">Numero</label>
                    <input type="number" id="numero" name="numero" class="input-style">
                </div>
                <button type="submit" class="boton-estilizado">Agregar Contacto</button>
            </form>
            <div id="resultado">
                <h3>Contactos almacenados:</h3>
                <ul>
                    <?php
                    // Inicia la sesión
                    
                    session_start();
                   
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nombre = $_POST["nombre"];
                        $numero = $_POST["numero"];

                        // Validar si el nombre está vacío
                        if (empty($nombre)) {
                            echo "<li><strong>Advertencia:</strong> El nombre no puede estar vacío.</li>";
                        } else {
                            // Buscar si el nombre ya existe en la agenda
                            $nombreExiste = false;
                            $indiceNombre = null;
                            if (isset($_SESSION['contactos'])) {
                                foreach ($_SESSION['contactos'] as $indice => $contacto) {
                                    if ($contacto['nombre'] === $nombre) {
                                        $nombreExiste = true;
                                        $indiceNombre = $indice;
                                        break;
                                    }
                                }
                            }

                            // Realizar las acciones según las condiciones
                            if (!$nombreExiste && !empty($numero)) {
                                // Agregar un nuevo contacto
                                $contacto = array(
                                    'nombre' => $nombre,
                                    'numero' => $numero
                                );
                                $_SESSION['contactos'][] = $contacto;
                            } elseif ($nombreExiste) {
                                if (!empty($numero)) {
                                    // Actualizar el número de teléfono si se proporciona
                                    $_SESSION['contactos'][$indiceNombre]['numero'] = $numero;
                                } else {
                                    // Eliminar la entrada si no se proporciona número de teléfono
                                    unset($_SESSION['contactos'][$indiceNombre]);
                                }
                            }
                        }
                    }

                    // Mostrar todos los contactos almacenados
                    if (isset($_SESSION['contactos'])) {
                        foreach ($_SESSION['contactos'] as $contacto) {
                            echo "<p><strong>Nombre:</strong> " . $contacto['nombre'] . ", <strong>Número:</strong> " . $contacto['numero'] . "</p>";
                        }
                        session_write_close();

                    }
                    

                    ?>
                </ul>
            </div>
        </div>
    </section>
    </section>
    </section>

</body>
</html>
