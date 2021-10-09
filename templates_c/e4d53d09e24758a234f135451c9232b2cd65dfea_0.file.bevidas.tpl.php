<?php
/* Smarty version 3.1.39, created on 2021-10-06 11:29:49
  from 'C:\xampp\htdocs\proyectos\web2\p1\templates\bevidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615d6c8d1a44b1_97645546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4d53d09e24758a234f135451c9232b2cd65dfea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web2\\p1\\templates\\bevidas.tpl',
      1 => 1633512496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_615d6c8d1a44b1_97645546 (Smarty_Internal_Template $_smarty_tpl) {
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
</div>
<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
