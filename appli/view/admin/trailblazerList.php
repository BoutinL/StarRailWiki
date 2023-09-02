<?php
    $trailblazerList = $result["data"]['trailblazerList'];
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
        <table class="userlist-container">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>DateRegister</th>
                <th>Role</th>
            </tr>
            <?php foreach ($trailblazerList as $trailblazer) { ?>
                <tr>
                    <td class="center"><?= $trailblazer->getUsername() ?></td>
                    <td class="center"><?= $trailblazer->getEmail() ?></td>
                    <td class="center"><?= $trailblazer->getDateRegister() ?></td>
                    <td class="center"><?= $trailblazer->getRole() ?></td>
                    <td class="center"></td>
                </tr>
            <?php } ?>    
        </table>
    <?php } ?>
</div>