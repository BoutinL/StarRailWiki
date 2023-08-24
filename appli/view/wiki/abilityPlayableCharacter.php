<?php
    $playableCharacter = $result["data"]['playableCharacter'];
    $playableCharacterCombatType = $result["data"]['playableCharacterCombatType'];

?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=playableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=ascendPlayableCharacter">Ascend</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <div class="abilities-content">
        
    </div>
</div>

