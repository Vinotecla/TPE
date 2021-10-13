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
                <tr>
            </thead>
            <tbody id="pedido-ingresado">
            {foreach from=$bevidas item=$b}
                <tr>
                        <th>{$b->tipo}</th>
                        <th>{$b->nombre}</th>
                        <th>{$b->contenido}ML</th>
                        <th>${$b->precio}</th>
                    <tr>
            {/foreach}
            </tbody >
        </table>
        <p></p>
    </div>
    <form action="login" method="post">
        <button type="submit">Iniciar Sesión</button>
    </form>

</div>
{include file="templates/footer.tpl"}