<?php
/* Smarty version 4.3.4, created on 2023-12-18 15:46:28
  from 'C:\xampp\htdocs\Servidor\Ferron_Vinuela_MiguelAngel_DWES05_Tarea\web\smarty\tarea\templates\productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65805b4483f826_22904409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b51bbcb6fbb60c385c941492f7d3a0b831302555' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Servidor\\Ferron_Vinuela_MiguelAngel_DWES05_Tarea\\web\\smarty\\tarea\\templates\\productos.tpl',
      1 => 1702910403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:productoscesta.tpl' => 1,
    'file:listaproductos.tpl' => 1,
  ),
),false)) {
function content_65805b4483f826_22904409 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: productos.php -->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea 5: Listado de Productos con Plantillas</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
  </head>

  <body class="pagproductos">
    <div id="contenedor">
      <div id="encabezado">
        <h1>Listado de productos</h1>
      </div>
    
      <!-- Dividir en varios templates -->
      <div id="cesta" style="text-align:center">      
        <?php $_smarty_tpl->_subTemplateRender("file:productoscesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
    
      <div id="productos">
        <?php $_smarty_tpl->_subTemplateRender("file:listaproductos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
  
      <br class="divisor" />
      <div id="pie">
        <form action='logoff.php' method='post'>
          <!-- Botón del mismo tipo que los demás -->
          <input type='submit' name='desconectar' class='boton' style='width:100%;' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
        </form>        
      </div>
    </div>
  </body>
</html><?php }
}
