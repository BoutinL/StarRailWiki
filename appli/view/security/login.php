<h1>Login</h1>

<form action="index.php?ctrl=security&action=login" method="post">
    <label for="email">Email
        <input type="email" name="email" placeholder="email@email.com" maxlength="50" required />
    </label>
    <label for="password">Password
        <input type="password" name="password" placeholder="password" maxlength="255" required />
    </label>
    <input class="button" type="submit" value="Login" name="submitLogin" />
</form>
