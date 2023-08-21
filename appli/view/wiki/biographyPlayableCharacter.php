<?php
$biographyPlayableCharacter = $result["data"]['biographyPlayableCharacter'];
    
?>

<h1>Character Details</h1>
<section class="navbar-details">
    <a href="index.php?ctrl=wiki&action=biographiePlayableCharacter">Biographie</a>
    <a href="index.php?ctrl=wiki&action=abilitiesPlayableCharacter">Abilities</a>
    <a href="index.php?ctrl=wiki&action=ascendPlayableCharacter">Ascend</a>
    <a href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
</section>
<section class="introduction">
    <span><?= $biographyPlayableCharacter->getName() ?></span>
    <figure>
        <img src="<?= $biographyPlayableCharacter->getImage() ?>" alt="<?=$biographyPlayableCharacter->getName()?>" />
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