{include file="templates/header.tpl"}
<div class="contenido">
    <form action="change" method="post">
        <input hidden name="id" value={$vino->id_vinos} >
        <select name='filtros'>
        {include file="templates/selectCategorias.tpl"}
        <input type="text" name="nombre" value={$vino->nombre}>
        <input type="number"name="contenido" value={$vino->contenido}> 
        <input type="number" name="precio" value={$vino->precio}>
        <input type="text"   name="descripcion" value={$vino->descripcion}>
        <button type="submit">Change</button>
    </form>
</div>

{include file="templates/footer.tpl"}