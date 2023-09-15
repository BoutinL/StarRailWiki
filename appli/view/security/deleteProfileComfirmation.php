<?php
    $trailblazer = $result['data']['trailblazer'];

    $links =  '<link rel="stylesheet" href="public/css/security/styleViewProfile.css">'
?>

<div class="content">
    <?php if (isset($trailblazer)) { ?>
        <span>Do you really want to delete your account ?</span>
        <div class="account-option" >
            <a class="button-delete" href="index.php?ctrl=security&action=deleteProfile">Confirm</a>
            <a class="button" href="index.php?ctrl=security&action=viewProfile">Cancel</a>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>