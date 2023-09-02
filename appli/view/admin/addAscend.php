<?php
    $playableCharacterList = $result['data']['playableCharacterList'];
    $playableCharacterList2 = $result['data']['playableCharacterList2'];
    $ascendList = $result['data']['ascendList']; 
    // var_dump($ascendList->current());die;
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
                <h1>Add a new Eidolon</h1>
                <form class="form" id="addAscendEidolon" action="index.php?ctrl=admin&action=addAscendEidolon" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterEidolon">Character's Eidolon :</label>
                        <select name="playableCharacterEidolon" id="playableCharacterEidolon" required>
                            <option>--Chose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                        echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>
                        
                        <label for="nbrEidolon">Number :</label>
                        <input type="number" name="nbrEidolon" id="nbrEidolon" required>
                        
                        <label for="nameEidolon">Name :</label>
                        <input type="text" name="nameEidolon" id="nameEidolon" placeholder="Enter Eidolon name" required>
                        
                        <label for="effectEidolon">Effect :</label>
                        <input type="text" name="effectEidolon" id="effectEidolon" placeholder="What's the effect of that Eidolon" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-urlEidolon">Image url :</label>
                        <input type="text" name="image-urlEidolon" id="image-urlEidolon" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAscendEidolon" name="submitEidolon" value="Add that new Eidolon to a character">

                <!-- Second form -->

                <h1>Add a new Trace</h1>
                <form class="form" id="addAscendTrace" action="index.php?ctrl=admin&action=addAscendTrace" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterTrace">Character's Trace :</label>
                        <select name="playableCharacterTrace" id="playableCharacterTrace" required>
                            <option>--Chose a character--</option>
                            <?php 
                                foreach($playableCharacterList2 as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                    echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>

                        <label for="nameTrace">Name :</label>
                        <input type="text" name="nameTrace" id="nameTrace" required>

                        <label for="effectTrace">Effect :</label>
                        <input type="text" name="effectTrace" id="effectTrace" placeholder="What's the effect of that Eidolon" required>

                        <label for="ascendTrace">Level of ascension :</label>
                        <select name="ascendTrace" id="ascendTrace">
                            <option>--Choose a level of Ascension--</option>
                            <?php 
                                foreach($ascendList as $ascend){
                                    // var_dump("$ascend->getNbr()");die;
                                    $nbr = $ascend->getNbr();
                                    $id = $ascend->getId();
                                    $lvlCap = $ascend->getCapLvl();
                                    // var_dump("$nbr");die;
                                    echo "<option value=\"$id\">Ascend $nbr - Lvl $lvlCap </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-not-required">
                        <label for="image-urlTrace">Image url :</label>
                        <input type="text" name="image-urlTrace" id="image-urlTrace" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAscendTrace" name="submitTrace" value="Add that new Trace to a character">
            </div>
        <?php endif; 
    } ?>
</div>