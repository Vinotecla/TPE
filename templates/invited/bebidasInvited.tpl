{include file="templates/header.tpl"}
<nav>
    <article  id="menu">
        <section><a href='login'>Login</a></section>
        <section><a href='register'>Registro</a></section>
        <section><a href='invitado'>Invitado</a></section>
        <section><a href='categorias'>Categorias</a></section>
    </article>
</nav>
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
                <tr>
            {/foreach}
            </tbody >
        </table>
        <p></p>
    </div>

</div>
{include file="templates/footer.tpl"}