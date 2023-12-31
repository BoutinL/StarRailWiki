<?php
    $biographyPlayableCharacter = $result["data"]['biographyPlayableCharacter'];
    $links =  '<link rel="stylesheet" href="public/css/wiki/styleBiographyPlayableCharacter.css">'
?>

<div class="content" style="<?= $biographyPlayableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $biographyPlayableCharacter->combatTypeCssBis() ?>">
        <a class="link-details <?= $biographyPlayableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Trace</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $biographyPlayableCharacter->getId() ?>">Review</a>
    </section>
    <section class="introduction">
        <figure class="portrait">
            <img class="splash-art" src="<?= $biographyPlayableCharacter->getImage() ?>" alt="<?=$biographyPlayableCharacter->getName()?> splash art" />
        </figure>
        <section class="biography-container">
            <div class="bio-content">
                <h2 class="bio-character-name"><strong><?= $biographyPlayableCharacter->getName() ?></strong></h2>
                <span> 
                    <?php for ($i = 0; $i < $biographyPlayableCharacter->getRarity(); $i++) {
                        echo '<img src="public/img/level_star.png' . '" alt="rarity level">';
                    }?>
                </span>
                <p>" <?= $biographyPlayableCharacter->getQuote() ?> "</p>
            </div>
            <div class="path-combatType-box">
                    <div class="path-box">
                        <?= $biographyPlayableCharacter->getImgPath() ?>
                        <span>The <?=$biographyPlayableCharacter->getPath()->getType() ?></span>
                    </div>
                    <div class="combatType-box">
                        <?= $biographyPlayableCharacter->getImgCombatType() ?>
                        <span><?= $biographyPlayableCharacter->getCombatType()->getType() ?></span>
                    </div>
            </div>
            <div class="bio-content">
                <span>Sex: <?= $biographyPlayableCharacter->getSex() ?></span>
                <span>Specie: <?= $biographyPlayableCharacter->getSpecie() ?></span>
                <span>Faction: <?= $biographyPlayableCharacter->getfaction() ?></span>
                <span>World: <?= $biographyPlayableCharacter->getWorld() ?></span>
                <span>Release date: <?= $biographyPlayableCharacter->getReleaseDateFormat(); ?></span>
            </div>
            <div class="bio-content">
                <p><?= $biographyPlayableCharacter->getIntroduction() ?></p>
            </div>
        </div>
    </section>
</div>