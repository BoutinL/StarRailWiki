<?php
    $trailblazer = $result['data']['trailblazer'];

    $links =  '<link rel="stylesheet" href="public/css/security/styleViewProfile.css">'
?>

<div class="content">
    <?php if (isset($trailblazer)) { ?>
        <div class="profile-container">
            <span>Do you really want to delete your account ?</span>
            <div>
                <a class="" href="index.php?ctrl=security&action=deleteProfile">Confirm</a>
                <a class="" href="index.php?ctrl=security&action=viewProfile">Cancel</a>
            </div>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>