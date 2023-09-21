<?php
    $trailblazer = $result['data']['trailblazer'];

    $links =  '<link rel="stylesheet" href="public/css/security/styleDeleteAccountConfirmation.css">'
?>

<div class="content">
    <?php if (isset($trailblazer)) { ?>
        <figure class='container-msg-emote'>
            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/arlan-woried.webp' alt='emote arlan stop' />
        </figure>
        <span class="main-text">Do you really want to delete your account ?</span>
        <span class="main-text">Its permanent !</span>
        <span class="text-anexe">( And permanent is very long ... )</span>
        <div class="account-option" >
            <a class="button-delete" href="index.php?ctrl=security&action=deleteProfile">Confirm</a>
            <a class="button" href="index.php?ctrl=security&action=viewProfile">Cancel</a>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>