<?php
/* Smarty version 4.3.4, created on 2023-12-17 11:08:45
  from 'C:\xampp\htdocs\Servidor\Ferron_Vinuela_MiguelAngel_DWES06\web\smarty\tarea\templates\cesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657ec8add57691_64387251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8f97a4fb82622c9bff3f33f3080d5b9be972b31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Servidor\\Ferron_Vinuela_MiguelAngel_DWES06\\web\\smarty\\tarea\\templates\\cesta.tpl',
      1 => 1701599437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657ec8add57691_64387251 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Tarea 5: Cesta de la Compra con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Cesta de la compra</h1>
  </div>
  <div id="productos">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productoscesta']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
        <p>
            <span class='codigo'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</span>
            <span class='nombre'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombre();?>
</span>
            <span class='precio'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
</span>
        </p>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <hr />
    <p><span class='pagar'>Precio total: <?php echo $_smarty_tpl->tpl_vars['coste']->value;?>
 €</span></p>
    <form action='pagar.php' method='post'>
        <p><span class='pagar'>
            <input type='submit' name='pagar' class='boton' value='Pagar'/>
        </span></p>
    </form>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' class='boton' style='width:100%;' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
    </form>        
  </div>
</div>
</body>
</html>
<?php }
}
