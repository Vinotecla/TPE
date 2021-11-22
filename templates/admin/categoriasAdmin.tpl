{include file="templates/header.tpl"}
<nav>
    <article  id="menu">
        <section><a href='home'>Admin</a></section>
        <section><a href='categorias'>Categorias</a></section>
    </article>
</nav>
<br>
<div class="contenido">
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
            {foreach from=$category item=$b}
                <tr>
                    <th>{$b->tipo}</th>
                    <th>{$b->descripcion}</th>
                    <th><a href='deletecat/{$b->id_tipo}'>BORRAR</a></th>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

    <form action='addcat' method='post'>
        <div>
            <input type="text" placeholder="Ingrese Tipo" name="tipo">
        </div>
        <div>
            <input type="text" placeholder="Ingrese Descripcion" name="descripcion">
        </div>
        <button type="submit">Agregar</button>
    </form>

    <form action='updatecat' method='post'>
        <div class="conteiner">
            <div>
                <select name='tipo'>
                {include file="templates/selectCategorias.tpl"}
            </div>
            <div>
                <input type="text" placeholder="Ingrese Descripcion" name="descripcion">
            </div>
        </div>
        <button type="submit">Modifiar</button>
    </form>
    
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>

</div>
{include file="templates/footer.tpl"}