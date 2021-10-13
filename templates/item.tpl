{include file="templates/headerItem.tpl"}

<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
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
    <div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>
    </div>

</div>
{include file="templates/footer.tpl"}