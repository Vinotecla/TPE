{include file="templates/header.tpl"}
    <h3>{$d->nombre}</h3>
    <p>{$d->tipo}</p>
    <p>{$d->descripcion}</p>
    <p>Contenido: {$d->contenido}ML</p>
    <p>Precio: ${$d->precio}</p>
    {* ---------CHEQUEAR VA POR API----------- *}
    {* <form action="comment" method="post">
        <div>
            <input type="text" placeholder="Ingrese Comentario" name="comentario">
        </div>
        <div>
            <select name='score'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select>
        </div>
        <button type="submit">Enviar</button>
    </form> *}
{* ---------CHEQUEAR VA POR API----------- *}
{include file="templates/footer.tpl"}