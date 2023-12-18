<?php
/* Smarty version 4.3.4, created on 2023-12-18 15:46:28
  from 'C:\xampp\htdocs\Servidor\Ferron_Vinuela_MiguelAngel_DWES05_Tarea\web\smarty\tarea\templates\productoscesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65805b44b36348_17947502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e90d8eedca49eaf7e324b6a20a490ea770a1c1f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Servidor\\Ferron_Vinuela_MiguelAngel_DWES05_Tarea\\web\\smarty\\tarea\\templates\\productoscesta.tpl',
      1 => 1702910403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65805b44b36348_17947502 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Plantilla para mostrar los artículos obtenidos y los botones para vaciar
    o comprar los artículos de la cesta (botones iguales que los demás) -->
<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
<hr />
<?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
    <p>Cesta vacía</p>
<?php } else { ?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productoscesta']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
        <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</p>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<form id='vaciar' action='productos.php' method='post'>
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
        <input type='submit' name='vaciar' class='boton' value='Vaciar Cesta' disabled='true' />
    <?php } else { ?>
        <input type='submit' name='vaciar' class='boton' value='Vaciar Cesta' />
    <?php }?>
</form>
<form id='comprar' action='cesta.php' method='post'>
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
        <input type='submit' name='comprar' class='boton' value='Comprar' disabled='true' />
    <?php } else { ?>
        <input type='submit' name='comprar' class='boton' value='Comprar' />
    <?php }?>
</form> 
<?php }
}
