<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleAdminCRUD.css">';

    $trace = $result['data']['trace'];
    $playableCharacterList = $result['data']['playableCharacterList'];
    $ascendList = $result['data']['ascendList'];
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <nav class="nav-admin">
            <ul>
                <li class="deroulant"><a href="#">Account Gestion &ensp;</a>
                    <ul class="sous">
                    <li><a href="index.php?ctrl=security&action=viewProfile>">Profile</a></li>
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
                <h1>Update <?= $trace->getName(); ?></h1>
                <form class="form" id="updateTrace" action="index.php?ctrl=admin&action=updateTrace&id=<?= $trace->getId() ?>" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterTrace">Character's Trace:</label>
                        <select name="playableCharacterTrace" id="playableCharacterTrace" required>
                        <option value="<?php echo $trace->getPlayableCharacter()->getId(); ?>"><?php echo $trace->getPlayableCharacter()->getName() ?></option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                        echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>
                        
                        <label for="nameTrace">Name :</label>
                        <input type="text" name="nameTrace" value="<?= $trace->getName(); ?>" id="nameTrace" placeholder="Enter trace name" required>
                        
                        <label for="effectTrace">Effect :</label>
                        <input type="text" name="effectTrace" value="<?= $trace->getEffect(); ?>" id="effectTrace" placeholder="What's the effect of that trace" required>
                        
                        <label for="ascendTrace">Lvl cap :</label>
                        <select name="ascendTrace" id="ascendTrace" required>
                        <option  hidden disabled value="<?php $trace->getId() ?>">Ascend <?= $trace->getAscend()->getNbr() ?> - Lvl <?= $trace->getAscend()->getCapLvl() ?></option>
                            <?php 
                                foreach($ascendList as $ascend){
                                    $nbr = $ascend->getNbr();
                                    $id = $ascend->getId();
                                    $lvlCap = $ascend->getCapLvl();
                                    echo "<option value=\"$id\">Ascend $nbr - Lvl $lvlCap </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-not-required">
                        <label for="imageUrlTrace">Image url :</label>
                        <input type="text" name="imageUrlTrace" value="<?= $trace->getIcon(); ?>" id="imageUrlTrace" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="updateTrace" name="submitTrace" value="Update <?= $trace->getName(); ?>">
            </div>
        <?php endif; 
    } ?>
</div>