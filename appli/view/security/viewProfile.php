<?php
    $trailblazer = $result['data']['trailblazer'];
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <section class="navbar-details">
        <a class="link-details" href="index.php?ctrl=security&action=viewProfile&id=<?= App\Session::getUser()->getId() ?>">Profile</a>
        <a class="link-details" href="index.php?ctrl=home&action=trailblazerList">User List</a>
        <a class="link-details" href="">Add Character</a>
        <a class="link-details" href="">Add Abilities</a>
        <a class="link-details" href="">Add Ascend</a>
    </section>
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