<?php

$playableCharacterList = $result["data"]['playableCharacterList'];
    
?>

<h1>Character list</h1>

<?php
foreach($playableCharacterList as $character){

    ?>
    <section class="card-container">
        <div class="card">
            <a href="index.php?ctrl=wiki&action=playableCharacterDetails&id=<?= $character->getId() ?>"></a>">
                <figure>
                    <img src="<?=$character->getImage()?>" alt="<?=$character->getName()?>" />
                </figure>
                <p><?=$character->getName()?></p>
            </a>
        </div>
    </section>
    <?php
}
