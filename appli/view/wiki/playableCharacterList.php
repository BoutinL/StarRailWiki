<?php
    $playableCharacterList = $result["data"]['playableCharacterList'];
    $links =  '<link rel="stylesheet" href="public/css/wiki/stylePlayableCharacterList.css">'
?>
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
<div class="scroll-container">
    <a href="#top"><i class="fa-solid fa-arrow-up circle" style="color: #ffffff;"></i></a>
</div>