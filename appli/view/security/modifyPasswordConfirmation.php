<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleRegister.css">';
    
    $trailblazer = $result['data']['trailblazer'];
?>

<div class="content">
    <?php if (isset($trailblazer)) { ?>
        <div class="form-container">
            <form class="form-content" action="index.php?ctrl=security&action=modifyPassword" method="POST">
                <label for="actualPassword">
                    <b>Actual password</b>
                    <input type="password" placeholder="Your actual password" name="actualPassword" required>
                </label>
                <label for="actualPassword">
                    <b>New password</b>
                    <input type="password" placeholder="Minimum 10 characters, at least one letter and one number" name="newPassword"  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$" required>
                </label>
                <label for="confirmPassword">
                    <b>Comfirm password</b>
                    <input type="password" placeholder="Comfirm password" name="confirmPassword" required>
                </label>
                <input type="submit" id='submit' value="Modify" name="submitModifyPassword">
            </form>
            <a class="" href="index.php?ctrl=security&action=viewProfile">Cancel</a>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>