<?php
    $playableCharacterList = $result["data"]['playableCharacterList'];
?>

<h1>Character list</h1>

<section class="card-container">
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
</section>
