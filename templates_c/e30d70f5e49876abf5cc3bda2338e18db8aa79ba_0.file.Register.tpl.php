<?php
/* Smarty version 3.1.39, created on 2021-10-09 01:16:03
  from 'C:\xampp\htdocs\proyects\WEB2\TPE\templates\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6160d133930005_15970454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e30d70f5e49876abf5cc3bda2338e18db8aa79ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\WEB2\\TPE\\templates\\Register.tpl',
      1 => 1633734958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6160d133930005_15970454 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="contenido">
    <div>
        <h2>Registro</h2>

    </div>
    <div>
        <form action="adduser" name='user' method="post">
            <input placeholder="email" type="text" name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" value="Registrarme">
        </form>
    <div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
