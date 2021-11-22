{include file="templates/header.tpl"}

    {* <nav>
        <article  id="menu">
            <section><a href='home'>Admin</a></section>
            <section><a href='login'>Login</a></section>
            <section><a href='register'>Registro</a></section>
            <section><a href='invitado'>Invitado</a></section>
            <section><a href='categorias'>Categorias</a></section>
        </article>
    </nav> *}
    <h3>{$category->tipo}</h3>
    <p>
    {$category->descripcion}
    </p>

{include file="templates/footer.tpl"}