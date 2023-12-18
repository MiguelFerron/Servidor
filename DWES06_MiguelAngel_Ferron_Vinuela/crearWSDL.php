<?php
require_once 'Funciones.php';
require_once 'WSDLDocument.php';

$wsdl = new WSDLDocument(
        'Funciones',
        'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/servicio.php',
        'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela');
header ('Content-Type: text/xml');
echo $wsdl->saveXML();
?>
