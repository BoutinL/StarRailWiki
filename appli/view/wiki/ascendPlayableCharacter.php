<?php
    $tracePlayableCharacter = $result["data"]['tracePlayableCharacter'];
    $eidolonPlayableCharacter = $result["data"]['eidolonPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=ascendPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Ascend</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="ascend-content">
        <div class="eidolon-container">
            <h1>Eidolon</h1>
            <?php foreach($eidolonPlayableCharacter as $eidolon){?>
                <table class="eidolon-details">
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
        <div class="trace-container">
            <h1>Trace</h1>
            <?php foreach($tracePlayableCharacter as $trace){?>
                <table class="trace-details">
                    <tr>
                        <td rowspan="2" class="center"><img src="<?= $trace->getIcon() ?>" alt="<?=$trace->getName()?> Icon" /></td>
                        <td><?= $trace->getName() ?></td>
                        <td>Lvl: <?= $trace->getAscend()->getCapLvl() ?></td>
                        <td>Ascend: <?= $trace->getAscend()->getNbr() ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $trace->getEffect() ?></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </section>
</div>