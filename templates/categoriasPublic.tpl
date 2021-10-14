{include file="templates/header.tpl"}
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
                </tr>
            {/foreach}
            </tbody >
        </table>
    </div>

</div>
{include file="templates/footer.tpl"}