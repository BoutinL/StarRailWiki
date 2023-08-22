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
        <h2><strong><?= $biographyPlayableCharacter->getName() ?></strong></h2>
        <figure>
            <img src="<?= $biographyPlayableCharacter->getImage() ?>" alt="<?=$biographyPlayableCharacter->getName()?> splash art" />
        </figure>
        <span><?= $biographyPlayableCharacter->getRarity() ?></span>
    </section>
    <section class="bio">
        <span><?= $biographyPlayableCharacter->getSex() ?></span>
        <span><?= $biographyPlayableCharacter->getSpecie() ?></span>
        <span><?= $biographyPlayableCharacter->getfaction() ?></span>
        <span><?= $biographyPlayableCharacter->getWorld() ?></span>
        <span><?= $biographyPlayableCharacter->getReleaseDate() ?></span>
    </section>
</div>