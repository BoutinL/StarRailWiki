<?php
    $links =  '<link rel="stylesheet" href="public/css/security/styleRegister.css">';
    
    $trailblazer = $result['data']['trailblazer'];
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
    <?php } 
    if (isset($trailblazer)) { ?>
        <div class="form-container">
            <form class="form-content" action="index.php?ctrl=security&action=modifyPassword" method="POST">
                <label for="actualPassword">
                    <b>Actual password</b>
                    <input type="password" placeholder="Your actual password" name="actualPassword" required>
                </label>
                <label for="actualPassword">
                    <b>New password</b>
                    <input type="password" placeholder="Minimum 10 characters, at least one letter and one number" name="newPassword"  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$" required>
                </label>
                <label for="confirmPassword">
                    <b>Comfirm password</b>
                    <input type="password" placeholder="Comfirm password" name="confirmPassword" required>
                </label>
                <input type="submit" id='submit' value="Modify" name="submitModifyPassword">
            </form>
        </div>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>