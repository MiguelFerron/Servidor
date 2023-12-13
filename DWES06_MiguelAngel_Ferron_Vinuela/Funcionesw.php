<?php

/**
 * Funciones class
 * 
 * Clase para el desarrollo web de entorno servidor. Tema 6: servicios web. 
 * Ejercicio: Documentación para generación automática de documento WSDL.
 * 
 * @author {Tu Nombre}
 * @copyright {Año} {Tu Nombre}
 * @package {Nombre del Paquete}
 */
class Funciones extends SoapClient {

  public function __construct($wsdl = "http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela//serviciow.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  } 

  /**
   * Obtiene el PVP correspondiente al código del producto que se le pase.
   *
   * @param string $cod
   * @return float
   */
  public function getPvp($cod) {
    return $this->__soapCall('getPvp', array(
            new SoapParam($cod, 'cod')
      ),
      array(
            'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene el stock del producto y tienda que se le pase.
   *
   * @param string $producto
   * @param int $tienda
   * @return int
   */
  public function getStock($producto, $tienda) {
    return $this->__soapCall('getStock', array(
            new SoapParam($producto, 'producto'),
            new SoapParam($tienda, 'tienda')
      ),
      array(
            'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene las familias existentes.
   *
   * @return Array
   */
  public function getFamilias() {
    return $this->__soapCall('getFamilias', array(),
      array(
            'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene los códigos de los productos de la familia que se le indique.
   *
   * @param string $codFamilia
   * @return Array
   */
  public function getProductosFamilia($codFamilia) {
    return $this->__soapCall('getProductosFamilia', array(
            new SoapParam($codFamilia, 'codFamilia')
      ),
      array(
            'uri' => 'http://127.0.0.1/servidor/DWES06_MiguelAngel_Ferron_Vinuela/',
            'soapaction' => ''
           )
      );
  }

}

?>
