<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleModifyPasswordconfirmation.css">';
    
    $trailblazer = $result['data']['trailblazer'];
?>

<div class="content">
    <?php if (isset($trailblazer)) { ?>
        <div class="form-container">
            <form class="form-content" action="index.php?ctrl=security&action=modifyPassword" method="POST">
                <label for="actualPassword">
                    <b>Actual password</b>
                    <input class="input-form" type="password" placeholder="Your actual password" name="actualPassword" required>
                </label>
                <label for="actualPassword">
                    <b>New password</b>
                    <input class="input-form" type="password" placeholder="Minimum 14 characters, at least one letter and one number" name="newPassword" required>
                </label>
                <label for="confirmPassword">
                    <b>Comfirm password</b>
                    <input class="input-form" type="password" placeholder="Comfirm password" name="confirmPassword" required>
                </label>
                <div class="option" >
                    <input class="button-modify" type="submit" id='submit' value="Modify" name="submitModifyPassword">
                    <a class="button" href="index.php?ctrl=security&action=viewProfile">Cancel</a>
                </div>
            </form>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>