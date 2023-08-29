<?php
    $trailblazer = $result['data']['trailblazer'];
?>

<div>
    <?php if (isset($trailblazer)) { ?>
        <table>
            <tr>
                <th>Profil</th>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?= $trailblazer->getUsername() ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= $trailblazer->getEmail() ?></td>
            </tr>
            <tr>
                <th>Role:</th>
                <td><?= $trailblazer->getRole() ?></td>
            </tr>
        </table>
    <?php } else { echo "<h1>No user connected</h1>"; } ?>
</div>