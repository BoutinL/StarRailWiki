<?php
    $abilitiesPlayableCharacter = $result["data"]['abilitiesPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=ascendPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Ascend</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="abilities-content">
        <?php foreach($abilitiesPlayableCharacter as $ability){ ?>
            <table class="ability-details">
                <tr>
                    <td rowspan="2" class="center"><img src="<?= $ability->getIcon() ?>" alt="<?=$ability->getName()?> Icon" /></td>
                    <td><?= $ability->getTypeAbility()->getType()?></td>
                    <td><?= $ability->getName() ?></td>
                    <td>Energy Cost: <?= $ability->getEnergyCost() ?></td>
                    <td>Energy Generation: <?= $ability->getEnergyGeneration() ?></td>
                    <td>Dammage: <?= $ability->getDmg() ?></td>
                    <td><?= $ability->getTagAbility()->getType() ?></td>
                </tr>
                <tr>
                    <td colspan="6"><?= $ability->getDescription() ?></td>
                </tr>
            </table>
        <?php } ?>
    </section>
</div>

