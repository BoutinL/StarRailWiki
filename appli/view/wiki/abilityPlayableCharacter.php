<?php
    $abilitiesPlayableCharacter = $result["data"]['abilitiesPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
    $links =  '<link rel="stylesheet" href="public/css/wiki/styleAbilityPlayableCharacter.css">'
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Review</a>
    </section>
    <section class="abilities-content">
        <?php if ($abilitiesPlayableCharacter){ 
            foreach($abilitiesPlayableCharacter as $ability){ ?>
                <table class="ability-details table-sizing">
                    <tbody>
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
                    </tbody>
                </table>
            <?php }
            } else { 
                echo "<div class='container-error-msg'>";
                    echo "<figure class='container-msg-emote'>
                            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/march-crying.png' alt='emote march sad' />
                        </figure>";
                    echo "<p class='error-msg'>We're sorry but there's no data yet !</p>"; 
                echo "</div>";
            } ?>
    </section>
</div>
