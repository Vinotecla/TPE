{include file="templates/header.tpl"}
<div class="contenido">
    <form action="change" method="post">
        <input hidden name="id" value={$vino->id_vinos} >
        {html_options name=tipo options=$myOptions selected=$mySelect}
        <input type="text" name="nombre" value={$vino->nombre}>
        <input type="number"name="contenido" value={$vino->contenido}> 
        <input type="number"   name="precio" value={$vino->precio}>
        <button type="submit">Change</button>
    </form>
</div>

{include file="templates/footer.tpl"}