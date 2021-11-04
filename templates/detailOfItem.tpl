{include file="templates/header.tpl"}
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
    </form>`
    </div>
    <div class='contenedorbebidas' >
        <table id='comments-view'>
        </table>
    </div>
        <form action="logout" method="post">
        <button type="submit">logout</button>
    </form>
<script src="./js/comments.js"></script>
{include file="templates/footer.tpl"}