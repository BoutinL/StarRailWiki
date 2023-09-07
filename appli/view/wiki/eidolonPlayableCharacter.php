<?php
    $eidolonPlayableCharacter = $result["data"]['eidolonPlayableCharacter'];
    $playableCharacter = $result["data"]['playableCharacter'];

    $links =  '<link rel="stylesheet" href="public/css/wiki/styleEidolonPlayableCharacter.css">'
?>

<div class="content" style="<?= $playableCharacter->combatTypeCss() ?>">
    <section class="navbar-details" style="<?= $playableCharacter->combatTypeCssBis() ?>">
        <a class="link-details" href="index.php?ctrl=wiki&action=biographyPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Biography</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=abilityPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Abilities</a>
        <a class="link-details <?= $playableCharacter->combatTypeCssLink() ?>" href="index.php?ctrl=wiki&action=eidolonPlayableCharacter&id=<?= $playableCharacter->getId() ?>">Eidolon</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=tracePlayableCharacter&id=<?= $playableCharacter->getId() ?>">Trace</a>
        <a class="link-details" href="index.php?ctrl=wiki&action=reviewsPlayableCharacter">Reviews</a>
    </section>
    <section class="eidolon-container">
        <?php 
            if($eidolonPlayableCharacter){
                foreach($eidolonPlayableCharacter as $eidolon){?>
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
                <?php }
                } else { 
                echo "<div class='container-error-msg'>";
                    echo "<figure class='container-msg-emote'>
                            <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/hook-sad.png' alt='emote sad hook' />
                        </figure>";
                    echo "<p class='error-msg'>We're sorry but there's no data yet !</p>"; 
                echo "</div>";
            } ?>
    </section>
</div>