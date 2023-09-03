<?php
    $eidolonPlayableCharacter = $result["data"]['eidolonPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="ascend-content">
        <div class="eidolon-container">
            <?php foreach($eidolonPlayableCharacter as $eidolon){?>
                <table class="eidolon-details table-sizing">
                    <tr>
                        <td rowspan="2" class="center"><img src="<?= $eidolon->getIcon() ?>" alt="<?=$eidolon->getName()?> Icon" /></td>
                        <td class="eidolon-nbr"><?= $eidolon->getNbr() ?></td>
                        <td class="eidolon-name "><?= $eidolon->getName() ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $eidolon->getEffect() ?></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </section>
</div>