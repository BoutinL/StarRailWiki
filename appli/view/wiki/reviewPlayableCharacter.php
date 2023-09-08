<?php
    $links =  '<link rel="stylesheet" href="public/css/wiki/styleReviewPlayableCharacter.css">';

    $commentPlayableCharacter = $result["data"]['commentPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
    // var_dump($commentPlayableCharacter);die;
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Review</a>
    </section>
    <h1 class="center">Reviews of <?= $playableCharacter->getName() ?></h1>
    <div class="review-container">
        <div class="reviews-box">
            <div class="review-display">
                <?php 
                    if($commentPlayableCharacter) {
                        foreach($commentPlayableCharacter as $comment){
                            echo "<div class='container-comment'>";
                            echo "<span> ".$comment->getTrailblazer()->getUsername()."</span> - ";
                            echo "<span> ".$comment->getDateCreateFormat()."</span>";
                            echo "<p class='comment-text'> ".$comment->getText()."</p>";
                            echo "</div>";
                        }
                    } else { 
                        echo "<div class='container-error-msg'>";
                        echo "<figure class='container-msg-emote'>
                        <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/march-crying.png' alt='emote sad hook' />
                        </figure>";
                        echo "<p class='error-msg'>There's no comment yet... </p>"; 
                        echo "</div>";
                    }
                ?>
            <form action="index.php?ctrl=wiki&action=addComment&id=<?= $playableCharacter->getId() ?>" method="POST">
                <label for="comment">Your opinion on <?= $playableCharacter->getName() ?></label>
                <textarea rows="" cols="" name="comment" id="comment" placeholder="Write a comment"  required></textarea>
                <input type="submit" name="submitComment" value="Submit">
            </form>
            </div>
        </div>
        <div class="rating-box">
            <span>5/5</span>
            <form action="index.php?ctrl=wiki&action=addRate&id=<?= $playableCharacter->getId() ?>" method="POST">
                <label for="rate"> Rating <?= $playableCharacter->getName() ?></label>
                <input type="number" name="rate" id="rate" required></input>
                <input type="submit" name="submitRate" value="Submit">
            </form>
        </div>
    </div>
</div>