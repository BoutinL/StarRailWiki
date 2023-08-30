<?php

?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <section class="navbar-details">
            <a class="link-details" href="index.php?ctrl=security&action=viewProfile&id=<?= App\Session::getUser()->getId() ?> ">Profile</a>
            <a class="link-details" href="index.php?ctrl=admin&action=trailblazerList">User List</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addCharacterView">Add Character</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addAbilities">Add Abilities</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addAscend">Add Ascend</a>
        </section>
        <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
            <div class ="addCharacter-container">
                <!-- Remettre le titre -->
                <form class="form-half" id="addCharacter" action="index.php?ctrl=home&action=addCharacter" method="POST">
                    <div class="input-required">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Enter Character name" required>

                        <label for="rarity">Rarity :</label>
                        <input type="number" name="rarity" id="rarity" placeholder="4 or 5" required>

                        <label for="combatType">Combat type :</label>
                        <select name="combatType" id="combatType" required>

                        <label for="path">Path :</label>
                        <select name="path" id="path" required>

                        <label for="realeaseDate">Release date :</label>
                        <input type="date" name="releaseDate" id="releaseDate" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" placeholder="https://honkai-star-rail-image-url.png">

                        <label for="sex">Sex :</label>
                        <input type="text" name="sex" id="sex" placeholder="Gender of the character">

                        <label for="specie">Specie :</label>
                        <input type="text" name="specie" id="specie" placeholder="Exemple: Human">

                        <label for="faction">Faction :</label>
                        <input type="text" name="faction" id="name" placeholder="Exemple: Stellaron Hunter">

                        <label for="world">World :</label>
                        <input type="text" name="world" id="world" placeholder="Exemple: Jarilo-VI">

                        <label for="quote">Quote :</label>
                        <input type="text" name="quote" id="quote" placeholder="A sentence the character often say">

                        <label for="introduction">Introduction :</label>
                        <input type="text" name="introduction" id="introduction" placeholder="Something about the character">
                    </div>
                </form>
                <input class="add-submit" type="submit" id="addCharacter" name="submit" value="Add">
            </div>
    <?php endif; } ?>
</div>