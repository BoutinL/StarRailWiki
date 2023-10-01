<?php
    $links =  '<link rel="stylesheet" href="public/css/wiki/stylePlayableCharacterList.css">';

    $playableCharacterList = $result["data"]['playableCharacterList'];
    $combatTypeList = $result["data"]["combatTypeList"];
    $pathList = $result["data"]["pathList"];
?>
<div class="content">
    <form class="order-list" id="orderList" action="index.php?ctrl=wiki&action=orderBy" method="POST">
        <section class="order-combatType">
            <label class="tall-font">Combat Type</label>
            <?php 
                foreach($combatTypeList as $combatType){
                    $id = $combatType->getId();
                    $name = $combatType->getType();
                    echo "<label for='combatType".$id."'>$name</label>";
                    echo "<input type='radio' id='combatType".$id."' name='idCombatType' value='$id' required/>";
                }
            ?>  
        </section>
        <section class="order-path">
            <label class="tall-font">Path</label>
            <?php 
                foreach($pathList as $path){
                    $id = $path->getId();
                    $name = $path->getType();
                    echo "<label for='path".$id."'>$name</label>";
                    echo "<input type='radio' id='path".$id."' name='idPath' value='$id' required/>";
                }
            ?>  
        </section>
        <input type="submit" name="submitOrder" value="Research">
    </form>
    <section class="card-container">
        <?php
            // if theres character in the list 
            if($playableCharacterList){
                // Loop on them to be able to display each one of them in a dynamic way
                foreach($playableCharacterList as $character){ 
                    // make the whole card a link
                    echo "<a class='card-link' href='index.php?ctrl=wiki&action=biographyPlayableCharacter&id=".$character->getId()."'>";
                        // If character's rarity = 4 display the div with purple border css proprietes
                        if($character->getRarity() == 4){
                            echo "<div class='card purple'>";
                        }
                        // If character's rarity = 5 display the div with golden border css proprietes
                        if($character->getRarity() == 5){
                            echo "<div class='card gold'>";
                        }
                            echo "<span class='list-character-name'><strong>".$character->getName()."</strong></span>
                            <figure class='card-img-container'>
                                <img class='card-img' src='".$character->getImage()."' alt='".$character->getName()." splash art' />
                            </figure>
                            <span class='rarity-container'>";
                                // add stars until its equal the character's rarity
                                for ($i = 0; $i < $character->getRarity(); $i++) {
                                    echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                                }
                            echo "</span>
                        </div>
                    </a>";
                } 
            } else {
                echo "<div class='container-error-msg'>
                    <figure class='container-msg-emote'>
                        <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/pela-curious.webp' alt='emote pela wondering' />
                    </figure>
                    <p class='error-msg'>There's no character...</p> 
                </div>";
            }
        ?>
    </section>
</div>
<div class="scroll-container">
    <a href="#top"><i class="fa-solid fa-arrow-up circle" style="color: #ffffff;"></i></a>
</div> 