<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleRegister.css">'
?>

<div class="form-container">
    <form class="form-content" action="index.php?ctrl=security&action=register" method="POST">
            <label for="username">
                <b>Username</b>
                <input type="text" id="username" placeholder="Your own username" name="username" required>
            </label>
            <label for="email">
                <b>Email</b>
                <input type="email" id="email" placeholder="exemple@exemple.com" name="email" required>
            </label>
            <label for="password">
                <b>Password</b>
                <input type="password" id="password" placeholder="Minimum 14 characters, at least one letter and one number" name="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{14,}$" required>
            </label>
            <label for="confirmPassword">
                <b>Confirm password</b>
                <input type="password" id="confirmPassword" placeholder="Write the same password once again" name="confirmPassword" required>
            </label>
            <b>Do you accept the <a class="link-unstyled" href="index.php?ctrl=legality&action=legalNotice"> Legal Notice </a> ?</b>
            <label for="acceptNotice">
                <input type="checkbox" id="acceptNotice" name="acceptNotice" value="yes i do">
            </label>
            <input class="button" type="submit" id='submit' value="Register" name="submitRegister">
        </form>
</div>