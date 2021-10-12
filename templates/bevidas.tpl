{include file="templates/header.tpl"}
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
                    <th>
                        DESPCRIPCIÓN
                    </th>
                <tr>
            </thead>
            <tbody id="pedido-ingresado">
            {foreach from=$bevidas item=$b}
                <tr>
                        <th><a type="button" href='category/{$b->tipo}'>{$b->tipo}</a></th>
                        <th><a href="item/{$b->id_vinos}">{$b->nombre}</a></th>
                        <th>{$b->contenido}ML</th>
                        <th>${$b->precio}</th>
                        <th>{$b->descripcion}</th>
                        <th><a type="button" href='delete/{$b->id_vinos}'>BORRAR</a></th>
                    <tr>
            {/foreach}
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

                {* <input type="text" placeholder="Ingrese Tipo" name="tipo"> *}
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
            <div>
                <input type="text"  placeholder="Ingrese Descripción" name="descripcion">
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
{include file="templates/footer.tpl"}