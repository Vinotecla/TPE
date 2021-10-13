{include file="templates/headerItem.tpl"}

<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <div class="contenedorbebidas">
            <table>
            <thead>
                <tr>
                    <th>
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
            <tbody>
                {foreach from=$item item=$b}
                    <tr>
                        <th>{$b->tipo}</th>
                        <th>{$b->nombre}</th>
                        <th>{$b->contenido}ML</th>
                        <th>${$b->precio}</th>
                        <th>{$b->descripcion}</th>
                    <tr>
                {/foreach}
            </tbody >
        </table>
    </div>
    <form action="itemEdit" method="post">
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
                <button type="submit">EDITAR</button>
            </div>
        </div>
    </form>
    <div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>
    </div>

</div>
{include file="templates/footer.tpl"}