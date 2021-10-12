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
                        DESPCRIPCIÓN
                    </th>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        {foreach from=$category item=$b}
                            <h3>{$b->tipo}</h3>
                        {/foreach}
                    </th>
                    <th>
                        {foreach from=$category item=$b}
                            <p>{$b->descripcion}</p>
                        {/foreach}
                    </th>
                <tr>
            </tbody >
        </table>
    </div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>

</div>
{include file="templates/footer.tpl"}