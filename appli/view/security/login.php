<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleLogin.css">'
?>

<div class="form-container">
    <form class="form-content" action="index.php?ctrl=security&action=login" method="post">
        <label for="email">
            <b>Email</b>
            <input type="email" id="email" name="email" placeholder="email@email.com" maxlength="50" required />
        </label>
        <label for="password">
            <b>Password</b>
            <input type="password" id="password" name="password" placeholder="Minimum 14 characters, at least one upper and lower caractere and one number" maxlength="255" required />
        </label>
        <input class="button" type="submit" value="Login" name="submitLogin" />
    </form>
</div>