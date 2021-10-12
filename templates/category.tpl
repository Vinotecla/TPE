{include file="templates/header.tpl"}
<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <div class="contenedorbebidas">
        <table>
            <thead>
                <tr>
                    <th id="filtro-variedad">
                        TIPO
                    </th>
                    <th>
                        DESPCRIPCIÓN
                    </th>
                <tr>
            </thead>
            <tbody id="pedido-ingresado">
{* AGREGAR CATEGORIA A VER ACA *}
            </tbody >
        </table>
    </div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>

</div>
{include file="templates/footer.tpl"}