<?php
/* Smarty version 4.3.4, created on 2023-12-02 16:01:53
  from 'C:\xampp\htdocs\Servidor\DWES05\web\smarty\tarea\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656b46e1ede3d0_41804755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a66b964959b3d52c4d28fba0e5e3986080efb49e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Servidor\\DWES05\\web\\smarty\\tarea\\templates\\login.tpl',
      1 => 1312200025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656b46e1ede3d0_41804755 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: login.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Login Tienda Web con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <div><span class='error'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html><?php }
}
