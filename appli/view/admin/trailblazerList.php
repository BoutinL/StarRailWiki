<?php
    $trailblazerList = $result["data"]['trailblazerList'];
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <section class="navbar-details">
            <a class="link-details" href="index.php?ctrl=security&action=viewProfile&id=<?= App\Session::getUser()->getId() ?> ">Profile</a>
            <a class="link-details" href="index.php?ctrl=admin&action=trailblazerList">User List</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addCharacterView">Add Character</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addAbilityView">Add Abilities</a>
            <a class="link-details" href="">Add Ascend</a>
        </section>
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