{include file="templates/header.tpl"}
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
                    {* <th><a href='updatecat/{$b->id_tipo}'>Modificar</a></th> *}
                </tr>
            {/foreach}
            </tbody>
        </table>
        
    </div>
    <form action='addcat' method='post'>
        <div class="conteiner">
            <div>
                <input type="text" placeholder="Ingrese Tipo" name="tipo">
            </div>
<<<<<<< HEAD
            <div>
                <input type="text" placeholder="Ingrese Descripcion" name="descripcion">
=======
            <button type="submit">Agregar</button>
        </form>
        <form action='updatecat' method='post'>
            <div class="conteiner">
                <div>
                    <select name='filtros'>
                    {include file="templates/selectCategorias.tpl"}
                </div>
                <div>
                   <input type="text" placeholder="Ingrese Descripcion" name="descripcion">
                </div>
>>>>>>> 3da448d87bd232591286351f753d33dad19b23a7
            </div>
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