<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleRegister.css">'
?>

<div class="form-container">
    <form class="form-content" action="index.php?ctrl=security&action=register" method="POST">
            <label>
                <b>Username</b>
                <input type="text" placeholder="Enter username" name="username" required>
            </label>
            <label>
                <b>Email</b>
                <input type="email" placeholder="Enter email" name="email" required>
            </label>
            <label>
                <b>Password</b>
                <input type="password" placeholder="Entrer password" name="password" required>
            </label>
            <label>
                <b>Comfirm password</b>
                <input type="password" placeholder="Comfirm password" name="confirmPassword" required>
            </label>
            <input type="submit" id='submit' value="Register" name="submitRegister">
    </form>
</div>