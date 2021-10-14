{include file="templates/header.tpl"}
    <h3>{$d->nombre}</h3>
    <p>{$d->tipo}</p>
    <p>{$d->descripcion}</p>
    <p>Contenido: {$d->contenido}ML</p>
    <p>Precio: ${$d->precio}</p>
{include file="templates/footer.tpl"}