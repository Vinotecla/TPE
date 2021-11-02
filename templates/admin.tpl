{include file="templates/header.tpl"}
<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <form action="filtro" method="post">
        <select name='filtros'>
        <option value="Todo">Todo</option>
        {include file="templates/selectCategorias.tpl"}
        <button type="submit">Fitrar</button>
    </form>
    <div class="contenedorbebidas">
        <table>
            
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
            {foreach from=$bevidas item=$b}
                <tr>
                    <th><a href='description/{$b->tipo}'>{$b->tipo}</a></th>
                    <th><a href='item/{$b->id_vinos}'>{$b->nombre}</a></th>
                    <th>{$b->contenido}ML</th>
                    <th>${$b->precio}</th>
                    <th><a type="button" href='delete/{$b->id_vinos}'>BORRAR</a></th>
                    <th><a type="button" href='modificar/{$b->id_vinos}'>MODIFICAR</a>
                    </th>
                <tr>
            {/foreach}
            </tbody >
        </table>
    </div>
    <form action="add" method="post">
        <div class="conteiner">
            <div>
            <select name='filtros'>
            {include file="templates/selectCategorias.tpl"}
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
    <div>
        <table>
            <thead>
                <tr>
                    <th>
                        USUARIO
                    </th>
                    <th>
                        PERMISOS
                    </th>
                <tr>
            </thead>
            <tbody>
            {foreach from=$users item=$u}
            <tr>
                <th>{$u->email}</th>
                <th>
                    {if $u->Admin == !null}
                        ADMIN
                        {else}
                            NO ADMIN
                    {/if}
                </th>
                <th><a href='changePermission/{$u->email}'>CAMBIAR PERMISOS</a></th>
                <th><a href='deleteUser/{$u->email}'>ELIMINAR</a></th>
            </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>

</div>
{include file="templates/footer.tpl"}