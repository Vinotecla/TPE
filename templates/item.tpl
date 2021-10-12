{include file="templates/headerItem.tpl"}

<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <div class="contenedorbebidas">
    <div class='conteiner'>
        {foreach from=$item item=$b}
            <h3>"{$b->nombre}"</h3>
        {/foreach}
    </div>
    <div class='conteiner'>
        {foreach from=$item item=$b}
            <h3>"{$b->descripcion}"</h3>
        {/foreach}
    </div>
    </div>
    <div>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>
    </div>

</div>
{include file="templates/footer.tpl"}