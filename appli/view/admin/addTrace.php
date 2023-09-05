<?php
    $playableCharacterList = $result['data']['playableCharacterList'];
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
                        <li><a href="index.php?ctrl=admin&action=addEidolonView">Add Eidolon</a></li>
                        <li><a href="index.php?ctrl=admin&action=addTraceView">Add Trace</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href="#">Update &ensp;</a>
                <ul class="sous">
                    <li><a href="index.php?ctrl=admin&action=updateCharacterView">Update Character</a></li>
                    <li><a href="index.php?ctrl=admin&action=updateAbilityView">Update Ability</a></li>
                    <li><a href="index.php?ctrl=admin&action=updateEidolonView">Update Eidolon</a></li>
                    <li><a href="index.php?ctrl=admin&action=updateTraceView">Update Trace</a></li>
                </ul>
                </li>
                <li class="deroulant"><a href="#">Delete &ensp;</a>
                <ul class="sous">
                    <li><a href="index.php?ctrl=admin&action=deleteCharacterView">Delete Character</a></li>
                    <li><a href="index.php?ctrl=admin&action=deleteAbilityView">Delete Ability</a></li>
                    <li><a href="index.php?ctrl=admin&action=deleteEidolonView">Delete Eidolon</a></li>
                    <li><a href="index.php?ctrl=admin&action=deleteTraceView">Delete Trace</a></li>
                </ul>
                </li>
            </ul>
        </nav>
        <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
            
            <div class ="form-admin-container">
                <h1>Add a new Trace</h1>
                <form class="form" id="addAscendTrace" action="index.php?ctrl=admin&action=addTrace" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterTrace">Character's Trace :</label>
                        <select name="playableCharacterTrace" id="playableCharacterTrace" required>
                            <option hidden disabled selected>--Choose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
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
                            <option hidden disabled selected>--Choose a level of Ascension--</option>
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