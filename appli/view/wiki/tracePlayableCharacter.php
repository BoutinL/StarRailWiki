<?php
    $tracePlayableCharacter = $result["data"]['tracePlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];

    $links =  '<link rel="stylesheet" href="public/css/wiki/styleTracePlayableCharacter.css">'

?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Review</a>
    </section>
    <section class="trace-container">
        <?php 
            if($tracePlayableCharacter) {
                foreach($tracePlayableCharacter as $trace){?>
                    <table class="trace-details table-sizing">
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
                <?php } 
            } else { 
                echo "<div class='container-error-msg'>";
                    echo "<figure class='container-msg-emote'>
                            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/hook-sad.png' alt='emote sad hook' />
                        </figure>";
                    echo "<p class='error-msg'>We're sorry but there's no data yet !</p>"; 
                echo "</div>";
            }
            ?>
    </section>
</div>