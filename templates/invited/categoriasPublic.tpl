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