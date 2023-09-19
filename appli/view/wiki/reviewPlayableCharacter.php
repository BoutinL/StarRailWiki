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
    <div class="review-content">
            <div class="rating-box">
                <!-- If user connected and he hasnt rate that character yet display form to rate -->
                <?php if(App\Session::getUser() && !$rateUser){ ?>
                    <form class="form-rate" id="addRate" action="index.php?ctrl=wiki&action=addRate&id=<?= $playableCharacter->getId() ?>" method="POST">
                        <fieldset class="field-rate">
                            <legend class="title-rating"> Rate <?= $playableCharacter->getName() ?> </legend>
                            <?php
                                for($rate = 1; $rate <= 5; $rate++){
                                    echo "
                                    <label class='input-radio-container'>
                                        ".$rate." star
                                        <input type='radio' id='".$rate."' name='rate' value='".$rate."' required/>
                                    </label>
                                    ";
                                }
                                
                            ?>
                        </fieldset>
                        <input class="submit-btn <?= $playableCharacter->combatTypeCssHover() ?>" type="submit" name="submitRate" value="Submit">
                    </form>
        
        
                <!-- If a connected user has already rate that character -> show the update form -->
                <?php } else if(App\Session::getUser() && $rateUser){
                    echo "<form class='form-rate' id='submitUpdateRate' action='index.php?ctrl=wiki&action=updateRate&id=".$playableCharacter->getId()."' method='POST'>
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
                        <input class='submit-btn ".$playableCharacter->combatTypeCssHover()."' type='submit' name='submitUpdateRate' value='Modify'>
                    </form>";
                } 
                if($statsRate["nbrOfRating"] != 0) { ?>
                    <div class="rate-star-box">
                        <?php for ($i = 0; $i < $statsRate["finalRate"]; $i++) {
                            echo '<img class="rate-size rate-img" src="/StarRailWiki/appli/public/img/rate_star.png" alt="rate-level">';
                        } ?>
                    </div>
                    <span class="rate-nbr"><?= $statsRate["nbrOfRating"] ?>  people voted</span>
                
                
                    <!-- If theres no rate, display error msg -->
                <?php } else {
                    echo "<div class='container-error-msg'>";
                        echo "<figure class='container-msg-emote'>
                                <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/gepard-ashamed.webp' alt='emote gepard shame' />
                            </figure>";
                        echo "<p class='error-msg'>There's no rating yet... </p>"; 
                    echo "</div>";
                } ?>
            </div>
            <div class="reviews-box">
                <!-- Display form comment if user connected -->
                <?php if(App\Session::getUser()){ ?>
                    <form action="index.php?ctrl=wiki&action=addComment&id=<?= $playableCharacter->getId() ?>" method="POST">
                        <label class="label-comment" for="comment">Your opinion on <?= $playableCharacter->getName() ?></label>
                        <div class="split-label-input">
                            <textarea style="<?= $playableCharacter->combatTypeCss() ?>" name="comment" id="comment" placeholder="Write a comment"  required></textarea>
                            <input class="submit-btn <?= $playableCharacter->combatTypeCssHover() ?>"  type="submit" name="submitComment" value="Submit">
                        </div>
                    </form>
                <?php } ?>
                <div class="review-display">
                    <?php 
                        // Display comment if theres data
                        if($commentPlayableCharacter) { ?>
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
                            <?php foreach($commentPlayableCharacter as $comment){
                                // If comment from a deleted user
                                if($comment->getTrailblazer() == null){
                                    echo "<div class='container-comment'>
                                        <span>Deleted user</span>
                                        <span> ".$comment->getDateCreateFormat()."</span>";
                                    if(App\Session::isAdmin()){ 
                                        echo "<i class='fa-solid fa-xmark' onClick='reply_click_delete(".$comment->getId().")' style='color: #e31616;'></i>";
                                    }
                                    echo "<p class='comment-text'> ".$comment->getText()."</p>
                                        </div>";
                                } else {
                                    echo "<div class='container-comment'>
                                        <span> ".$comment->getTrailblazer()->getUsername()."</span>";
                                        if(App\Session::isAdmin()){
                                            echo "<i class='fa-solid fa-ban' onClick='reply_click(".$comment->getTrailblazer()->getId().", ".$comment->getPlayableCharacter()->getId().")' style='color: #e31616;'></i>";
                                        }
                                        echo "<span> ".$comment->getDateCreateFormat()."</span>";
                                        if(App\Session::isAdmin() OR App\Session::getUser()->getId() == $comment->getTrailblazer()->getId()){
                                            echo "<i class='fa-solid fa-xmark' onClick='reply_click_delete(".$comment->getId().")' style='color: #e31616;'></i>";
                                        }
                                        echo "<p class='comment-text'> ".$comment->getText()."</p>
                                    </div>";
                                    // Modal change role confirmation
                                    echo '<div id="myModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <span id="spanName" class="text-modal">Change the role : </span>
                                            <form id="updateRole" action="index.php?ctrl=admin&action=updateRoleConfirm&id='.$comment->getTrailblazer()->getId().'" method="POST">
                                                <div class="input-box">
                                                    <label class="text-modal">Member
                                                        <input type="radio" id="updateRoleMember" name="roleUser" value="ROLE_MEMBER" required/>
                                                    </label>
                                                    <label class="text-modal">Ban
                                                        <input type="radio" id="updateRoleBan" name="roleUser" value="ROLE_BAN" required/>
                                                    </label>
                                                </div>
                                                <div class="confirm-box">
                                                    <input class="button-delete" type="submit" form="updateRole" name="updateRole" value="Confirm">
                                                    <a class="button-cancel" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id='.$playableCharacter->getId().'">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>';
                                }
                            }
                        // If theres no data, display that
                        } else { 
                            echo "<div class='container-error-msg'>
                                <figure class='container-msg-emote'>
                                    <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/hook-sad.png' alt='emote sad hook' />
                                </figure>
                                <p class='error-msg'>There's no comment yet... </p>
                            </div>";
                        }
                    ?>
                </div>
        </div>
        <!--  Modal delete confirmation  -->
        <div id="modalDelete" class="modal">
            <div class="modal-content">
                <span id="spanDelete" class="closeDelete">&times;</span>
                <span id="spanName" class="text-modal">Do you really want to delete that comment ?</span>
                <div class="confirm-box">
                    <!-- href= completed by js -->
                    <a class="button-delete-confirm" href="">Delete</a>
                    <a class="button-cancel" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Cancel</a>
                </div>
            </div>
        </div>
    </div>

<script>
    // modal for delete
    let modalDelete = document.getElementById("modalDelete");
    let spanDelete = document.getElementById("spanDelete");
    
    spanDelete.onclick = function() {
        modalDelete.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modalDelete) {
            modalDelete.style.display = "none";
        }
    }
    
    function reply_click_delete(idUser)
    {   
        modalDelete.style.display = "block";
        
        let buttonDeleteConfirm = document.querySelector(".button-delete-confirm");

        buttonDeleteConfirm.href = "index.php?ctrl=admin&action=deleteComment&id="+idUser;
    }


    // Modal ban
    let modal = document.getElementById("myModal");
    // Get 
    let form = document.getElementById("updateRole");
    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function reply_click(id, idPlayableCharacter)
    {   
        modal.style.display = "block";

        form.action="index.php?ctrl=admin&action=updateRoleConfirm&id="+id;
    }
</script> 