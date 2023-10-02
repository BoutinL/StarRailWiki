<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleAdminCRUD.css">';

    $ability = $result['data']['ability'];
    $playableCharacterList = $result['data']['playableCharacterList'];
    $typeAbilityList = $result['data']['typeAbilityList'];
    $tagAbilityList = $result['data']['tagAbilityList'];

    // var_dump( $typeAbilityList->current()->getType());die;
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
                <h1>Update <?= $ability->getName(); ?></h1>
                <form class="form" id="updateAbility" action="index.php?ctrl=admin&action=updateAbility&id=<?= $ability->getId() ?>" method="POST">
                    <div class="input-required">
                        <label for="playableCharacter">Character's ability :</label>
                        <select name="playableCharacter" id="playableCharacter" required>
                        <option hidden value="<?php echo $ability->getPlayableCharacter()->getId(); ?>"><?php echo $ability->getPlayableCharacter()->getName() ?></option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                    echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>

                        <label for="name">Name :</label>
                        <input type="text" name="name" value="<?php  echo $ability->getName(); ?>" id="name" placeholder="Enter Ability name" required>

                        <label for="description">description :</label>
                        <textarea rows="10" name="description" id="description" placeholder="What's the effect of that ability" required><?php  echo $ability->getDescription(); ?></textarea>

                        <label for="typeAbility">Ability Type :</label>
                        <select name="typeAbility" id="typeAbility" required>
                        <option hidden value="<?php echo $ability->getTypeAbility()->getId(); ?>"><?php echo $ability->getTypeAbility()->getType(); ?></option>
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
                        <option hidden value="<?php echo $ability->getTagAbility()->getId(); ?>"><?php echo $ability->getTagAbility()->getType(); ?></option>
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
                        <input type="number" name="energyGeneration" value="<?php  echo $ability->getEnergyGeneration(); ?>" id="energyGeneration">

                        <label for="energyCost">Energy cost :</label>
                        <input type="number" name="energyCost" value="<?php  echo $ability->getEnergyCost(); ?>" id="energyCost">

                        <label for="dmg">Dammage :</label>
                        <input type="number" name="dmg" value="<?php  echo $ability->getDmg(); ?>" id="dmg">

                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" value="<?php  echo $ability->getIcon(); ?>" id="image-url" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="button" type="submit" form="updateAbility" name="submit" value="Update">
            </div>
        <?php endif; } ?>
</div>