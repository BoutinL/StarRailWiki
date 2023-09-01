<?php
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
    <?php } if (isset($trailblazer)) { ?>
        <table class="profile-container">
            <tr>
                <th colspan="2">Profile</th>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= $trailblazer->getUsername() ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $trailblazer->getEmail() ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?= $trailblazer->getRole() ?></td>
            </tr>
            <tr>
                <th>Date register</th>
                <td><?= $trailblazer->getDateRegister() ?></td>
            </tr>
        </table>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>