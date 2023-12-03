<?php
/* Smarty version 4.3.4, created on 2023-12-03 11:17:56
  from 'C:\xampp\htdocs\Servidor\DWES05\web\smarty\tarea\templates\ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656c55d4315d44_87145366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e03cafa295417c14e1aa089d947fa2e6d327b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Servidor\\DWES05\\web\\smarty\\tarea\\templates\\ordenador.tpl',
      1 => 1701597991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656c55d4315d44_87145366 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ordenador.tpl -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>

    <ul>
        <li><strong>Código:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</li>
        <li><strong>Procesador:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</li>
        <li><strong>RAM:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
</li>
        <li><strong>Disco:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdisco();?>
</li>
        <li><strong>Tarjeta Gráfica:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</li>
        <li><strong>Unidad Óptica:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</li>
        <li><strong>Sistema Operativo:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getso();?>
</li>
        <li><strong>Otros:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</li>
        <li><strong>PVP:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getpvp();?>
 euros</li>
        <li><strong>Descripción:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</li>
    </ul>

    <!-- Agrega más contenido según sea necesario -->

</body>
</html>
<?php }
}
