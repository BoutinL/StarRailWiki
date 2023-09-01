<?php
    $playableCharacterList = $result['data']['playableCharacterList'];
    $tagAbilityList = $result['data']['tagAbilityList'];
    $typeAbilityList = $result['data']['typeAbilityList'];
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
                    <li><a href="#">Delete Character</a></li>
                    <li><a href="#">Delete Ability</a></li>
                    <li><a href="#">Delete Ascend</a></li>
                </ul>
                </li>
            </ul>
        </nav>
        <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
            
            <div class ="form-admin-container">
                <h1>Add a new ability</h1>
                <form class="form" id="addAbility" action="index.php?ctrl=admin&action=addAbility" method="POST">
                    <div class="input-required">
                        <label for="playableCharacter">Character's ability :</label>
                        <select name="playableCharacter" id="playableCharacter" required>
                            <option>--Chose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                    echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>

                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Enter Ability name" required>

                        <label for="description">description :</label>
                        <input type="text" name="description" id="description" placeholder="What's the effect of that ability" required>

                        <label for="typeAbility">Ability Type :</label>
                        <select name="typeAbility" id="typeAbility" required>
                            <option>--Chose a type ability--</option>
                            <?php 
                                foreach($typeAbilityList as $typeAbility){
                                    $id = $typeAbility->getId();
                                    $type = $typeAbility->getType();
                                    echo "<option value=\"$id\">$type</option>";
                                }
                            ?>
                        </select>

                        <label for="tagAbility">Ability Tag :</label>
                        <select name="tagAbility" id="tagAbility" required>
                            <option>--Chose a tag ability--</option>
                            <?php 
                                foreach($tagAbilityList as $tagAbility){
                                    $id = $tagAbility->getId();
                                    $type = $tagAbility->getType();
                                    echo "<option value=\"$id\">$type</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-not-required">
                        <label for="energyGeneration">Energy generated :</label>
                        <input type="number" name="energyGeneration" id="energyGeneration">

                        <label for="energyCost">Energy cost :</label>
                        <input type="number" name="energyCost" id="energyCost">

                        <label for="dmg">Dammage :</label>
                        <input type="number" name="dmg" id="dmg">

                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAbility" name="submit" value="Add that new ability to a character">
            </div>
        <?php endif; 
    } ?>
</div>