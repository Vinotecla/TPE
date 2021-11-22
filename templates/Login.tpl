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
    <div>
        <h2>{$titulo}</h2>

    </div>
    <div>
        <form action="verify" method="post">
            <input placeholder="email" type="text" name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password" required>
            <input type="submit" value="Enter">
        </form>
    <div>
    <h3 class="alert">{$error}</h3>
</div>
{include file="templates/footer.tpl"}