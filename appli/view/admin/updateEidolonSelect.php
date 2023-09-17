<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleAdminCRUD.css">';

    $eidolonList = $result['data']['eidolonList'];
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
                <h1>Update an eidolon</h1>
                <form class="form" id="updateEidolonSelect" action="index.php?ctrl=admin&action=updateEidolonSelect" method="POST">
                <label class="label-select" for="eidolon">Eidolon to update :</label>
                    <select name="eidolon" id="eidolon" required>
                        <option hidden disabled selected>--Chose an eidolon--</option>
                        <?php 
                            foreach($eidolonList as $eidolon){
                                $id = $eidolon->getId();
                                $name = $eidolon->getName();
                                echo "<option value=\"$id\">$id - $name</option>";
                            }
                        ?>
                    </select>
                    <input class="button" type="submit" form="updateEidolonSelect" name="submit" value="Select">
                </form>
            </div>
        <?php endif; 
    } ?>
</div>