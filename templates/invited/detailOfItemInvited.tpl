{include file="templates/header.tpl"}

    <nav>
        <article  id="menu">
            <section><a href='login'>Login</a></section>
            <section><a href='register'>Registro</a></section>
            <section><a href='invitado'>Invitado</a></section>
            <section><a href='categorias'>Categorias</a></section>
        </article>
    </nav>
    <h3>{$d->nombre}</h3>
    <p>{$d->tipo}</p>
    <p>{$d->descripcion}</p>
    <p>Contenido: {$d->contenido}ML</p>
    <p>Precio: ${$d->precio}</p>
    <form method="get">
        <input type="hidden" id='comments' value='{$d->id_vinos}'>
    </form>
    <div class='contenedorbebidas' >
        <table id='comments-view'>
        </table>
    </div>
<script src="./js/comments.js"></script>
{include file="templates/footer.tpl"}