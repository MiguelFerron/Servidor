<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tarea del tema 07
 * Miguel Ferron Viñuela
 */
//

// Incluimos la librería Xajax
require_once('include/xajax_core/xajax.inc.php');
// Incluimos el fichero de acceso a la base de datos
require_once('DB.php');
// activamos el uso de variables de sesión
session_start();
// Creamos el objeto xajax
$xajax = new xajax('','xajax_','utf-8',true);
//$xajax->debugOn();

// Registramos las funciones que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"anadeCesta");
$xajax->register(XAJAX_FUNCTION,"vaciaCesta");
$xajax->register(XAJAX_FUNCTION,"muestraCesta");

// El método processRequest procesa las peticiones que llegan a la página
$xajax->processRequest();

/**
 * Función para añadir productos a la cesta.
 * @param string $producto - Código del producto a añadir.
 * @return xajaxResponse - Objeto de respuesta xajax.
 */
function anadeCesta($producto){
	// Creamos un objeto de respuesta xajax
	$respuesta = new xajaxResponse();
	// Indicamos el valor que retornará el objeto
	$respuesta->setReturnValue($producto);
	// devolvemos el objeto preparado
	return $respuesta;
}

/**
 * Función para vaciar la cesta.
 * @return xajaxResponse - Objeto de respuesta xajax.
 */
function vaciaCesta(){
	// creamos un objeto de respuesta xajax
	$respuesta = new xajaxResponse();
	// Indicamos que el objeto devolverá la palabra 'vaciar'.
	// Es una especie de control, ya que si devolvemos algún texto es como si
	// hubiésemos devuelto 'true' porque se devuelve algún valor, y siempre podemos
	// comprobar en productos.php si se devuelve este valor y no otro
	$respuesta->setReturnValue('vaciar');
	// devolvemos el valor del objeto
	return $respuesta;
}

/**
 * Función para mostrar el contenido de la cesta.
 * @return xajaxResponse - Objeto de respuesta xajax.
 */
function muestraCesta(){
	// creamos un objeto de respuesta xajax
	$respuesta = new xajaxResponse();
	// Si se muestra la cesta se inicializa el último artículo comprado
	$_SESSION['ultimo']="";
	// Indicamos que el objeto devolverá la palabra 'comprar'.
	// Es una especie de control, ya que si devolvemos algún texto es como si
	// hubiésemos devuelto 'true' porque se devuelve algún valor, y siempre podemos
	// comprobar en productos.php si se devuelve este valor y no otro
	$respuesta->setReturnValue('comprar');
	// devolvemos el valor del objeto
	return $respuesta;
}
?>
