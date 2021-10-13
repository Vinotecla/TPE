{include file="templates/header.tpl"}
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
        <form action="register" method="post">
        <button type="submit">Register</button>
        </form>
        <form action="invitado" method="post">
            <button type="submit">Invited</button>
        </form>
    <div>
    <h3 class="alert">{$error}</h3>
</div>
{include file="templates/footer.tpl"}