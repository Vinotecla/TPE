{include file="templates/header.tpl"}

    <nav>
        <article  id="menu">
            <section><a href='home'>Admin</a></section>
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
    <div id='comments-input'>
    <form action='insertar' id='form-comment' method="post">
        <div>
        <input type="hidden" value={$d->id_vinos} name="id_vino" id="id_vino">
            <input type="text" placeholder="Ingrese Comentario" name="comentario" id="comentario">
        </div>
        <div>
            <select name='puntaje' id='puntaje'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select>
        </div>
        <input value='Enviar' type="submit">
    </div>
    </form>
    <div>
        <form name='puntaje-filtro' id='form-filtro'>
            <select name='puntaje-filtro' id='puntaje-filtro'>
                <option value='Todos'>Todos</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select>
            <input type="submit" value="Filtrar">
        </form>
    </div>
        <div>
        <form name='puntaje-orden' id='form-orden'>
            <select name='puntaje-filtro' id='orden'>
                <option value='Mayor Puntaje'>Mayor Puntaje</option>
                <option value='Menor Puntaje'>Menor Puntaje</option>
                <option value='Mas Antiguo'>Más Antiguo</option>
                <option value='Mas Reciente'>Más Reciente</option>
            </select>
            <input type="submit" value="Ordenar">
        </form>
    </div>
    <div id='contenedor-comentarios' >
    </div>
    <table id='contenedor-comentario'>
    </table>
    <table id='comments-view'>
    </table>
    <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>
<script src="./js/comments.js"></script>
{include file="templates/footer.tpl"}