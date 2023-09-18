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
                    echo "<span>$name</span>";
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
                    echo "<span>$name</span>";
                    echo "<input type='radio' id='path".$id."' name='idPath' value='$id' required/>";
                }
            ?>  
        </section>
        <input type="submit" name="submitOrder" value="Research">
    </form>
    <section class="card-container">
        <?php
            if($playableCharacterList){
                foreach($playableCharacterList as $character){ 
                    echo"<a class='card-link' href='index.php?ctrl=wiki&action=biographyPlayableCharacter&id=".$character->getId()."'>";
                    if($character->getRarity() == 4){
                        echo "<div class='card purple'>";
                    } else {
                        echo "<div class='card gold'>";
                    }
                    echo "<h1 class='list-character-name'><strong>".$character->getName()."</strong></h1>";
                    echo "<figure class='card-img-container'>
                        <img class='card-img' src='".$character->getImage()."' alt='".$character->getName()." splash art' />
                    </figure>
                    <span class='rarity-container'>";
                    for ($i = 0; $i < $character->getRarity(); $i++) {
                        echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                    }
                    echo "</span>
                </div>
            </a>";
                } 
            } else {
                echo "<div class='container-error-msg'>";
                    echo "<figure class='container-msg-emote'>
                            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/pela-curious.webp' alt='emote pela wondering' />
                        </figure>";
                    echo "<p class='error-msg'>There's no corresponding character...</p>"; 
                echo "</div>";
            }
        ?>
    </section>
</div>
<div class="scroll-container">
    <a href="#top"><i class="fa-solid fa-arrow-up circle" style="color: #ffffff;"></i></a>
</div> 