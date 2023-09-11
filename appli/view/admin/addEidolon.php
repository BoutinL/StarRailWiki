<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleAdminCRUD.css">';
    
    $playableCharacterList = $result['data']['playableCharacterList'];
    // var_dump($ascendList->current());die;
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
                <h1>Add a new Eidolon</h1>
                <form class="form" id="addAscendEidolon" action="index.php?ctrl=admin&action=addEidolon" method="POST">
                    <div class="input-required">
                        <label for="playableCharacterEidolon">Character's Eidolon :</label>
                        <select name="playableCharacterEidolon" id="playableCharacterEidolon" required>
                            <option hidden disabled selected>--Choose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                        echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>
                        
                        <label for="nbrEidolon">Number :</label>
                        <div class="nbrEidolon-radio">
                            <?php
                                for($nbrEidolon = 1; $nbrEidolon <= 6; $nbrEidolon++){
                                    echo "
                                    <label for='nbrEidolon'>
                                        ".$nbrEidolon."
                                        <input type='radio' id='".$nbrEidolon."' name='nbrEidolon' value='".$nbrEidolon."' required/>
                                    </label>
                                    ";
                                }
                            ?>
                        </div>
                        
                        <label for="nameEidolon">Name :</label>
                        <input type="text" name="nameEidolon" id="nameEidolon" placeholder="Enter Eidolon name" required>
                        
                        <label for="effectEidolon">Effect :</label>
                        <textarea rows="10" type="text" name="effectEidolon" id="effectEidolon" placeholder="What's the effect of that Eidolon" required></textarea>
                    </div>
                    <div class="input-not-required">
                        <label for="image-urlEidolon">Image url :</label>
                        <input type="text" name="image-urlEidolon" id="image-urlEidolon" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAscendEidolon" name="submitEidolon" value="Add that new Eidolon to a character">
            </div>
        <?php endif; 
    } ?>
</div>