<?php
    $abilitiesPlayableCharacter = $result["data"]['abilitiesPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
    $playableCharacterCombatType = $result["data"]['playableCharacterCombatType'];
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=ascendPlayableCharacter">Ascend</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="abilities-content">
        <?php foreach($abilitiesPlayableCharacter as $ability){ ?>
            <div class="ability">
                <div>
                    
                    <span>Name: <?= $ability->getName() ?></span>
                    <span>Energy Cost:<?= $ability->getEnergyCost() ?></span>
                    <span>Energy Generation: <?= $ability->getEnergyGeneration() ?></span>
                    <span>Dammage: <?= $ability->getDmg() ?></span>
                </div>
                <div>
                    <p><?= $ability->getDescription() ?></p>
                </div>
            </div>
        <?php } ?>
    </section>
</div>

