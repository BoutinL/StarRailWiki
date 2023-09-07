<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleLogin.css">'
?>

<div class="form-container">
    <form class="form-content" action="index.php?ctrl=security&action=login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="email@email.com" maxlength="50" required />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password" maxlength="255" required />
        <input class="button" type="submit" value="Login" name="submitLogin" />
    </form>
</div>

