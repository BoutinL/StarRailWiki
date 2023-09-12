<?php
    $links =  '<link rel="stylesheet" href="public/css/wiki/styleReviewPlayableCharacter.css">';
    $commentPlayableCharacter = $result["data"]['commentPlayableCharacter'];
    // Comments side
    $playableCharacter = $result["data"]['playableCharacter'];
    $pages = $result["data"]['pages'];
    $currentPage = $result["data"]['currentPage'];
    // Rating side
    $statsRate = $result["data"]['statsRate'];
    // Ratings of user
    $rateUser = $result["data"]['rateUser'];
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
                            echo "<span> ".$comment->getTrailblazer()->getUsername()."</span>";
                            echo "<span> ".$comment->getDateCreateFormat()."</span>";
                            echo "<p class='comment-text'> ".$comment->getText()."</p>";
                            echo "</div>";
                        }
                        ?>
                        <div class='pagination-box'>
                            <ul class='pagination'>
                                <li class="link-details <?= ($currentPage == 1) ? 'disabled' : '' ?>"><a href='index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>&page=<?= $currentPage - 1 ?>' ><</a></li>
                                <?php
                                    for($page = 1; $page <= $pages; $page++){?>
                                        <li class="link-details">
                                            <a class="<?= ($currentPage == $page) ? $playableCharacter->combatTypeCssLink() : '' ?>" href='index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>&page=<?= $page ?>'><?= $page ?></a>
                                        </li>
                                    <?php }
                                ?>
                                <li class="link-details <?= ($currentPage == $pages) ? 'disabled' : '' ?>"><a href='index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>&page=<?= $currentPage + 1 ?>'>></a></li>
                            </ul>
                        </div>
                        <?php
                    } else { 
                        echo "<div class='container-error-msg'>";
                            echo "<figure class='container-msg-emote'>
                                    <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/hook-sad.png' alt='emote sad hook' />
                                </figure>";
                            echo "<p class='error-msg'>There's no comment yet... </p>"; 
                        echo "</div>";
                    }
                ?>
            </div>
            <?php if(App\Session::getUser()){ ?>
                <form action="index.php?ctrl=wiki&action=addComment&id=<?= $playableCharacter->getId() ?>" method="POST">
                    <label class="label-comment" for="comment">Your opinion on <?= $playableCharacter->getName() ?></label>
                    <div class="split-label-input">
                        <textarea style="<?= $playableCharacter->combatTypeCss() ?>" name="comment" id="comment" placeholder="Write a comment"  required></textarea>
                        <input class="submit-btn" type="submit" name="submitComment" value="Submit">
                    </div>
                </form>
            <?php } ?>
        </div>
        <div class="rating-box">
            <?php if($statsRate["nbrOfRating"] != 0) { ?>
                <span class="rate-size title-rating"><?= $playableCharacter->getName() ?>'s rating</span>
                <div class="rate-star-box">
                    <?php for ($i = 0; $i < $statsRate["finalRate"]; $i++) {
                        echo '<img class="rate-size rate-img" src="/StarRailWiki/appli/public/img/rate_star.png" alt="rate-level">';
                    } ?>
                <div>
                <span class="rate-nbr"><?= $statsRate["nbrOfRating"] ?>  people voted</span>
            <?php } else {
                echo "<div class='container-error-msg'>";
                    echo "<figure class='container-msg-emote'>
                            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/gepard-ashamed.webp' alt='emote gepard shame' />
                        </figure>";
                    echo "<p class='error-msg'>There's no rating yet... </p>"; 
                echo "</div>";
            }
            ?>
            <?php if(App\Session::getUser() && !$rateUser){ ?>
                <form class="form-rate" id="addRate" action="index.php?ctrl=wiki&action=addRate&id=<?= $playableCharacter->getId() ?>" method="POST">
                    <fieldset class="field-rate">
                        <legend class="title-rating"> Rate <?= $playableCharacter->getName() ?> </legend>
                        <?php
                            for($rate = 1; $rate <= 5; $rate++){
                                echo "
                                <label class='input-radio-container' for='rate'>
                                    ".$rate." star
                                    <input type='radio' id='".$rate."' name='rate' value='".$rate."' required/>
                                </label>
                                ";
                            }
                        ?>
                    </fieldset>
                    <input class="submit-btn" type="submit" name="submitRate" value="Submit">
                </form>
            <?php }else {
                echo "<form class='form-rate' id='submitUpdateRate' action='index.php?ctrl=wiki&action=updateRate&id=<?= ".$playableCharacter->getId()."' method='POST'>
                    <fieldset class='field-rate'>
                        <legend class='title-rating'> Rate ".$playableCharacter->getName()."</legend>";
                        for($rate = 1; $rate <= 5; $rate++){
                            echo "<label class='input-radio-container' for='rate'>
                                ".$rate." star";
                                $userRate = $rateUser->getRate();
                                if( $userRate == $rate){
                                    echo "<input type='radio' id='".$userRate."' name='rate' value='".$userRate."' checked required/>";
                                } else {
                                    echo "<input type='radio' id='".$rate."' name='rate' value='".$rate."' required/>";
                                }
                            echo "</label>";
                        }
                    echo "</fieldset>
                    <input class='submit-btn' type='submit' name='submitUpdateRate' value='Submit'>
                </form>";
            } ?>
        </div>
    </div>
</div> 