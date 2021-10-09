<?php
/* Smarty version 3.1.39, created on 2021-10-09 00:26:35
  from 'C:\xampp\htdocs\proyects\WEB2\TPE\templates\bevidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6160c59b6b9fc9_68321190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e35f363b36ae5cd44b5c78a3e7e016977d081bc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\WEB2\\TPE\\templates\\bevidas.tpl',
      1 => 1633731972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6160c59b6b9fc9_68321190 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <div class="contenedorbebidas">
        <table>
            <form action="filtro" method="post">
                <select name="filtros">
                    <option value="Todo">Todo</option>
                    <option value="Malbec">Malbec</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Cabernet">Cabernet</option>
                    <option value="Rosado">Rosado</option>
                </select>
                <button type="submit">Fitrar</button>
            </form>
            <thead>
                <tr>
                    <th id="filtro-variedad">
                        TIPO
                    </th>
                    <th>
                        NOMBRE
                    </th>
                    <th>
                        CONTENIDO
                    </th>
                    <th>
                        PRECIO
                    </th>
                <tr>
            </thead>
            <tbody id="pedido-ingresado">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bevidas']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
                <tr>
                        <th><?php echo $_smarty_tpl->tpl_vars['b']->value->tipo;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['b']->value->nombre;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['b']->value->contenido;?>
ML</th>
                        <th>$<?php echo $_smarty_tpl->tpl_vars['b']->value->precio;?>
</th>
                        <th><a type="button" href='delete/<?php echo $_smarty_tpl->tpl_vars['b']->value->id_vinos;?>
'>BORRAR</a></th>
                    <tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody >
        </table>
    </div>
    <form action="add" method="post">
        <div class="conteiner">
            <div>
                <select name="tipo">
                        <option value="Malbec">Malbec</option>
                        <option value="Blanco">Blanco</option>
                        <option value="Cabernet">Cabernet</option>
                        <option value="Rosado">Rosado</option>
                </select>

                            </div>
            <div>
                <input type="text" placeholder="Ingrese Nombre" name="nombre">
            </div>
            <div>
                <input type="number" placeholder="Ingrese Contenido" name="contenido">
            </div>
            <div>
                <input type="number"  placeholder="Ingrese Precio" name="precio">
            </div>
        </div>
        <div class="conteiner">
            <div>
                <button type="submit">AGREGAR</button>
            </div>
        </div>
    </form>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
