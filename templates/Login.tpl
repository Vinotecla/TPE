{include file="templates/header.tpl"}
<div class="contenido">
    <div>
        <h2>Login</h2>

    </div>
    <div>
        <form action="verify" method="post">
            <input placeholder="email" type="text" name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" value="login">
        </form>
    <div>
    <h3 class="alert">{$error}</h3>
</div>
{include file="templates/footer.tpl"}