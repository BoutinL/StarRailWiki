<h1>Login</h1>

<form action="index.php?ctrl=security&action=login" method="post">
    <div>
        <label for="email">Votre email</label>
        <input type="email" name="email" placeholder="votreemail@email.com" maxlength="50" required />
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="password" maxlength="255" required />
    </div>

    <div>
        <input class="button" type="submit" value="Connexion" name="submitLogin" />
    </div>
</form>
