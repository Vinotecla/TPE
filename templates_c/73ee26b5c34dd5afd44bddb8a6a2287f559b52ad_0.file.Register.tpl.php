<?php
/* Smarty version 3.1.39, created on 2021-10-08 17:50:17
  from 'C:\xampp\htdocs\WEB2\TPE\templates\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616068b91ca617_02236400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73ee26b5c34dd5afd44bddb8a6a2287f559b52ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\TPE\\templates\\Register.tpl',
      1 => 1633708201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_616068b91ca617_02236400 (Smarty_Internal_Template $_smarty_tpl) {
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
            <input type="submit" value="adduser">
        </form>
    <div>
    <h3 class="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h3>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
