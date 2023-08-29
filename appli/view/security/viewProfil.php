<?php
    $trailblazer = $result['data']['trailblazer'];
?>

<div class="profil-content">
    <?php if (isset($trailblazer)) { ?>
        <table class="profil-container">
            <tr>
                <th colspan="2">Profil</th>
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