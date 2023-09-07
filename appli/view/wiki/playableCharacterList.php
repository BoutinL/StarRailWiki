<?php
    $links =  '<link rel="stylesheet" href="public/css/wiki/stylePlayableCharacterList.css">';

    $playableCharacterList = $result["data"]['playableCharacterList'];
    $combatTypeList = $result["data"]["combatTypeList"];
    $pathList = $result["data"]["pathList"];
    // var_dump($combatTypeList->current()->getType());die;
?>
<div class="content">
    <form class="order-list" id="orderList" action="" method="POST">
        <span>Order by</span>
        <section class="order-combatType">
            <label for="combatType">Combat Type</label>
            <?php 
                foreach($combatTypeList as $combatType){
                    $id = $combatType->getId();
                    $name = $combatType->getType();
                    echo "<span>$name</span>";
                    echo "<input type='radio' id='combatType' name='orderParamCombatType' value='$id'/>";
                }
            ?>  
        </section>
        <section class="order-path">
            <label for="path">Path</label>
            <?php 
                foreach($pathList as $path){
                    $id = $path->getId();
                    $name = $path->getType();
                    echo "<span>$name</span>";
                    echo "<input type='radio' id='path' name='orderParamPath' value='$id'/>";
                }
            ?>  
        </section>
        <input type="submit" name="orderList" value="Research">
    </form>
    <section class="card-container">
        <?php foreach($playableCharacterList as $character){ ?>
            <a class="card-link" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $character->getId() ?>">
                <div class="card">
                    <h1 class="list-character-name"><strong><?=$character->getName()?></strong></h2>
                    <figure class="card-img-container">
                        <img class="card-img" src="<?=$character->getImage()?>" alt="<?=$character->getName()?> splash art" />
                    </figure>
                    <span class="rarity-container">
                        <?php for ($i = 0; $i < $character->getRarity(); $i++) {
                            echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                        }?>
                    </span>
                </div>
            </a>
        <?php } ?>
    </section>
</div>
<div class="scroll-container">
    <a href="#top"><i class="fa-solid fa-arrow-up circle" style="color: #ffffff;"></i></a>
</div> 