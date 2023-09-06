<?php
    $eidolon = $result['data']['eidolon'];
    $playableCharacterList = $result['data']['playableCharacterList'];
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
                <h1>Update <?= $eidolon->getName(); ?></h1>
                <form class="form" id="updateEidolon" action="index.php?ctrl=admin&action=updateEidolon&id=<?= $eidolon->getId() ?>" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterEidolon">Character's Eidolon :</label>
                        <select name="playableCharacterEidolon" id="playableCharacterEidolon" required>
                        <option value="<?php echo $eidolon->getPlayableCharacter()->getId(); ?>"><?php echo $eidolon->getPlayableCharacter()->getName() ?></option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                        echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>
                        
                        <label for="nbrEidolon">Number :</label>
                        <input type="number" name="nbrEidolon" value="<?= $eidolon->getNbr(); ?>" id="nbrEidolon" required>
                        
                        <label for="nameEidolon">Name :</label>
                        <input type="text" name="nameEidolon" value="<?= $eidolon->getName(); ?>" id="nameEidolon" placeholder="Enter Eidolon name" required>
                        
                        <label for="effectEidolon">Effect :</label>
                        <input type="text" name="effectEidolon" value="<?= $eidolon->getEffect(); ?>" id="effectEidolon" placeholder="What's the effect of that Eidolon" required>
                    </div>
                    <div class="input-not-required">
                        <label for="imageUrlEidolon">Image url :</label>
                        <input type="text" name="imageUrlEidolon" value="<?= $eidolon->getIcon(); ?>" id="imageUrlEidolon" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="updateEidolon" name="submitEidolon" value="Update <?= $eidolon->getName(); ?>">
            </div>
        <?php endif; 
    } ?>
</div>