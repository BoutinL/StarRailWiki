<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleAdminCRUD.css">';

    $playableCharacter = $result['data']['playableCharacter'];
    $combatTypeList = $result['data']['combatTypeList'];
    $pathList = $result['data']['pathList'];
    // var_dump($playableCharacter->getId());die;
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <nav class="nav-admin">
            <ul>
                <li class="deroulant"><a href="#">Account Gestion &ensp;</a>
                    <ul class="sous">
                    <li><a href="index.php?ctrl=security&action=viewProfile">Profile</a></li>
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
                <h1>Update <?= $playableCharacter->getName(); ?> <?php  ?></h1>
                <form class="form" id="updateCharacter" action="index.php?ctrl=admin&action=updateCharacter&id=<?= $playableCharacter->getId(); ?>" method="POST">
                    <div class="input-required">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" value="<?php  echo $playableCharacter->getName(); ?>" placeholder="Enter Character name" required>

                        <?php 
                            // To display the right input radio radio while updating
                            $rarity = $playableCharacter->getRarity();
                            if($rarity == 4){
                                echo "
                                    <label for='rarity'>Rarity :</label>
                                    <div class='rarity-radio'>
                                        <label for='rarity'>
                                            4 Stars
                                            <input type='radio' id='4' name='rarity' value='4' required checked/>
                                        </label>
                                        <label for='rarity'>
                                            5 Stars
                                            <input type='radio' id='5' name='rarity' value='5' required/>
                                        </label>
                                    </div>
                                ";
                            } else {
                                echo "
                                    <label for='rarity'>Rarity :</label>
                                    <div class='rarity-radio'>
                                        <label for='rarity'>
                                            4 Stars
                                            <input type='radio' id='4' name='rarity' value='4' required/>
                                        </label>
                                        <label for='rarity'>
                                            5 Stars
                                            <input type='radio' id='5' name='rarity' value='5' required checked/>
                                        </label>
                                    </div>
                                ";
                            }
                        ?>

                        <label for="combatType">Combat type :</label>
                        <select name="combatType"  id="combatType" required>
                            <option hidden value="<?php echo $playableCharacter->getCombatType()->getId(); ?>"><?php echo $playableCharacter->getCombatType()->getType(); ?></option>
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
                        <option hidden value="<?php echo $playableCharacter->getPath()->getId(); ?>"><?php echo $playableCharacter->getPath()->getType(); ?></option>
                            <?php 
                                foreach($pathList as $path){
                                    $id = $path->getId();
                                    $type = $path->getType();
                                    echo "<option value=\"$id\">$type</option>";
                                }
                            ?>
                        </select>

                        <label for="realeaseDate">Release date :</label>
                        <input type="date" name="releaseDate" id="releaseDate" value="<?php  echo $playableCharacter->getReleaseDate(); ?>" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" value="<?php  echo $playableCharacter->getImage(); ?>" placeholder="https://star-rail-image-url.png">

                        <label for="sex">Sex :</label>
                        <input type="text" name="sex" id="sex" value="<?php  echo $playableCharacter->getSex(); ?>" placeholder="Gender of the character">

                        <label for="specie">Specie :</label>
                        <input type="text" name="specie" id="specie" value="<?php  echo $playableCharacter->getSpecie(); ?>" placeholder="Exemple: Human">

                        <label for="faction">Faction :</label>
                        <input type="text" name="faction" id="name" value="<?php  echo $playableCharacter->getFaction(); ?>" placeholder="Exemple: Stellaron Hunter">

                        <label for="world">World :</label>
                        <input type="text" name="world" id="world" value="<?php  echo $playableCharacter->getWorld(); ?>" placeholder="Exemple: Jarilo-VI">

                        <label for="quote">Quote :</label>
                        <input type="text" name="quote" id="quote" value="<?php  echo $playableCharacter->getQuote(); ?>" placeholder="A sentence the character often say">

                        <label for="introduction">Introduction :</label>
                        <textarea rows="10" name="introduction" id="introduction" placeholder="Something about the character"><?php  echo $playableCharacter->getIntroduction(); ?></textarea>
                    </div>
                </form>
                <input class="button" type="submit" form="updateCharacter" name="submit" value="Update <?= $playableCharacter->getName(); ?>">
            </div>
        <?php endif; } ?>
</div>