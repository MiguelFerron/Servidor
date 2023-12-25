<?php

/**
 * Funciones class
 * 
 * Clase para el desarrollo web de entorno servidor. Tema 6: servicios web. 
 * Ejercicio: Documentación para generación automática de documento WSDL.
 * 
 * @author Miguel Angel Ferrón VIñuela
 */
class Funciones extends SoapClient {

  /**
   * Constructor de la clase Funciones.
   *
   * @param string $wsdl
   * @param array $options
   */
  public function __construct($wsdl = "http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/serviciow.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  } 

  /**
   * Obtiene el PVP correspondiente al código del producto que se le pase.
   *
   * @param string $cod
   * @return float
   */
  public function getPvp($cod) {
    try {
      return $this->__soapCall(
        'getPvp',
        array(new SoapParam($cod, 'cod')),
        array(
          'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
          'soapaction' => ''
        )
      );
    } catch (SoapFault $e) {
      // Manejar el error de llamada SOAP, si es necesario
      return -1; // Puedes devolver un valor específico para indicar un error
    }
  }

  /**
   * Obtiene el stock del producto y tienda que se le pase.
   *
   * @param string $producto
   * @param int $tienda
   * @return int
   */
  public function getStock($producto, $tienda) {
    try {
      return $this->__soapCall(
        'getStock',
        array(
          new SoapParam($producto, 'producto'),
          new SoapParam($tienda, 'tienda')
        ),
        array(
          'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
          'soapaction' => ''
        )
      );
    } catch (SoapFault $e) {
      // Manejar el error de llamada SOAP, si es necesario
      return -1;
    }
  }

  /**
   * Obtiene las familias existentes.
   *
   * @return array
   */
  public function getFamilias() {
    try {
      return $this->__soapCall(
        'getFamilias',
        array(),
        array(
          'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
          'soapaction' => ''
        )
      );
    } catch (SoapFault $e) {
      // Manejar el error de llamada SOAP, si es necesario
      return array("<span style='background:yellow'>ERROR: ".$e->getCode()."</span>", "<span style='color:red'>".$e->getMessage()."</span>");
    }
  }

  /**
   * Obtiene los códigos de los productos de la familia que se le indique.
   *
   * @param string $codFamilia
   * @return array
   */
  public function getProductosFamilia($codFamilia) {
    try {
      return $this->__soapCall(
        'getProductosFamilia',
        array(new SoapParam($codFamilia, 'codFamilia')),
        array(
          'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
          'soapaction' => ''
        )
      );
    } catch (SoapFault $e) {
      // Manejar el error de llamada SOAP, si es necesario
      return array("<span style='background:yellow'>ERROR: ".$e->getCode()."</span>", "<span style='color:red'>".$e->getMessage()."</span>");
    }
  }
}

?>
