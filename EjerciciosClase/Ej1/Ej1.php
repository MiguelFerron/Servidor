<!DOCTYPE html>
<html>
<head>
    <title>Fecha Actual en Castellano</title>
</head>
<body>
    <h1>Fecha Actual en Castellano</h1>

    <?php
    // Configura la zona horaria a la de Madrid (puedes ajustarla a tu zona horaria deseada)
    date_default_timezone_set('Europe/Madrid');
    
    // Días de la semana y meses en castellano
    $dias_semana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    
    // Obtiene la fecha actual
    $fecha_actual = date('Y-m-d'); // Formato YYYY-MM-DD
    $dia_semana = $dias_semana[date('w', strtotime($fecha_actual))];
    $dia = date('d', strtotime($fecha_actual));
    $mes = $meses[date('n', strtotime($fecha_actual))];
    $anio = date('Y', strtotime($fecha_actual));
    
    // Muestra la fecha actual en el formato deseado
    echo "<p>$dia_semana, $dia de $mes de $anio</p>";
    ?>

</body>
</html>
