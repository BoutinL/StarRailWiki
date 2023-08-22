<?php
$biographyPlayableCharacter = $result["data"]['biographyPlayableCharacter'];
    
?>

<h1>Character Details</h1>
<div class="content">
    <section class="navbar-details">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Biographie</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilitiesPlayableCharacter">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=ascendPlayableCharacter">Ascend</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="introduction">
        <figure class="portrait">
            <img src="<?= $biographyPlayableCharacter->getImage() ?>" alt="<?=$biographyPlayableCharacter->getName()?> splash art" />
        </figure>
        <div class="biography-container">
            <div class="bio-container">
                <h2 class="bio-character-name"><strong><?= $biographyPlayableCharacter->getName() ?></strong></h2>
                <span> 
                    <?php for ($i = 0; $i < $biographyPlayableCharacter->getRarity(); $i++) {
                        echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                    }?>
                </span>
                <span>Sex: <?= $biographyPlayableCharacter->getSex() ?></span>
                <span>Specie: <?= $biographyPlayableCharacter->getSpecie() ?></span>
                <span>Faction: <?= $biographyPlayableCharacter->getfaction() ?></span>
                <span>World: <?= $biographyPlayableCharacter->getWorld() ?></span>
                <span>Release date: <?= $biographyPlayableCharacter->getReleaseDate() ?></span>
            </div>
            <div class="introduction">
                <p><?= $biographyPlayableCharacter->getIntroduction() ?></p>
            </div>
        </div>
    </section>
</div>