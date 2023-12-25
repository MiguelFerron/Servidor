<?php
        require_once 'Funciones.php';
        require_once 'WSDLDocument.php';
        header('Content-Type: text/xml');
        $wsdl = new WSDLDocument('Funciones');
                echo $wsdl->saveXML();
                
?>
