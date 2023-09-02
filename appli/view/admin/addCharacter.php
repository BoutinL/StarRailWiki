<?php
    $combatTypeList = $result['data']['combatTypeList'];
    $pathList = $result['data']['pathList'];
    // var_dump($combatTypeList->current());die;
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <nav class="nav-admin">
            <ul>
                <li class="deroulant"><a href="#">Account Gestion &ensp;</a>
                    <ul class="sous">
                    <li><a href="index.php?ctrl=security&action=viewProfile&id=<?= App\Session::getUser()->getId() ?>">Profile</a></li>
                    <li><a href="index.php?ctrl=admin&action=trailblazerList">User List</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href="#">Add &ensp;</a>
                    <ul class="sous">
                        <li><a href="index.php?ctrl=admin&action=addCharacterView">Add Character</a></li>
                        <li><a href="index.php?ctrl=admin&action=addAbilityView">Add Abilities</a></li>
                        <li><a href="index.php?ctrl=admin&action=addAscendView">Add Ascend</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href="#">Update &ensp;</a>
                <ul class="sous">
                    <li><a href="#">Update Character</a></li>
                    <li><a href="#">Update Ability</a></li>
                    <li><a href="#">Update Ascend</a></li>
                </ul>
                </li>
                <li class="deroulant"><a href="#">Delete &ensp;</a>
                <ul class="sous">
                    <li><a href="index.php?ctrl=admin&action=deleteCharacterView">Delete Character</a></li>
                    <li><a href="#">Delete Ability</a></li>
                    <li><a href="#">Delete Ascend</a></li>
                </ul>
                </li>
            </ul>
        </nav>
        <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
            
            <div class ="form-admin-container">
                <h1>Add a new character</h1>
                <form class="form" id="addCharacter" action="index.php?ctrl=admin&action=addCharacter" method="POST">
                    <div class="input-required">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Enter Character name" required>

                        <label for="rarity">Rarity :</label>
                        <input type="number" name="rarity" id="rarity" placeholder="4 or 5" required>

                        <label for="combatType">Combat type :</label>
                        <select name="combatType" id="combatType" required>
                            <option></option>
                            <?php 
                                foreach($combatTypeList as $combatType){
                                    $id = $combatType->getId();
                                    $type = $combatType->getType();
                                    echo "<option value=\"$id\">$type</option>";
                                }
                            ?>
                        </select>

                        <label for="path">Path :</label>
                        <select name="path" id="path" required>
                            <option></option>
                            <?php 
                                foreach($pathList as $path){
                                    $id = $path->getId();
                                    $type = $path->getType();
                                    echo "<option value=\"$id\">$type</option>";
                                }
                            ?>
                        </select>

                        <label for="realeaseDate">Release date :</label>
                        <input type="date" name="releaseDate" id="releaseDate" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" placeholder="https://star-rail-image-url.png">

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
                <input class="add-submit" type="submit" form="addCharacter" name="submit" value="Add the new character to the list">
            </div>
        <?php endif; } ?>
</div>