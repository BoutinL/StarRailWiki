<?php
    $AbilitiesPlayableCharacter = $result["data"]['AbilitiesPlayableCharacter'];

?>

<div class="content" style="<?= $AbilitiesPlayableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $AbilitiesPlayableCharacter->combatTypeCssBis() ?>">
        <a class="link-details <?= $AbilitiesPlayableCharacter->combatTypeCssLink() ?>" style="" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $AbilitiesPlayableCharacter->getId() ?>">Biography</a>
        <a class="link-details <?= $AbilitiesPlayableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=abilitiesPlayableCharacter&id=<?= $AbilitiesPlayableCharacter->getId() ?>">Abilities</a>
        <a class="link-details <?= $AbilitiesPlayableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=ascendPlayableCharacter">Ascend</a>
        <a class="link-details <?= $AbilitiesPlayableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <div class="abilities-content">
        
    </div>
</div>