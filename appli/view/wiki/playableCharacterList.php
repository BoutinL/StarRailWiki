<?php
    $playableCharacterList = $result["data"]['playableCharacterList'];
?>
<section class="card-container">
    <h1 class="title">Character list</h1>
    <div class="card-only">
        <?php foreach($playableCharacterList as $character){ ?>
            <a class="card-link" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $character->getId() ?>">
                <div class="card">
                    <h2 class="list-character-name"><strong><?=$character->getName()?></strong></h2>
                    <figure class="card-img-container">
                        <img class="card-img" src="<?=$character->getImage()?>" alt="<?=$character->getName()?> splash art" />
                    </figure>
                    <span>
                        <?php for ($i = 0; $i < $character->getRarity(); $i++) {
                            echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                        }?>
                    </span>
                </div>
            </a>
        <?php } ?>
    </div>
</section>