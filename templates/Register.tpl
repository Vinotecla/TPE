{include file="templates/header.tpl"}
<div class="contenido">
    <div>
        <h2>Registro</h2>

    </div>
    <div>
        <form action="adduser" name='user' method="post">
            <input placeholder="email" type="text" name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" value="Registrarme">
        </form>
        <form action="login" method="post">
            <button type="submit">Iniciar Sesión</button>
        </form>
        <form action="invitado" method="post">
            <button type="submit">Invitado</button>
        </form>
    <div>
</div>
{include file="templates/footer.tpl"}