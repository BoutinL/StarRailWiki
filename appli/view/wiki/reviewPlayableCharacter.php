<?php
    $links =  '<link rel="stylesheet" href="public/css/wiki/styleReviewPlayableCharacter.css">';

    $reviewPlayableCharacter = $result["data"]['reviewPlayableCharacter'];
    $commentPlayableCharacter = $result["data"]['commentPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Review</a>
    </section>
    <section class="">
        <h1>Reviews of <?php $playableCharacter->getName() ?></h1>
    </section>
</div>