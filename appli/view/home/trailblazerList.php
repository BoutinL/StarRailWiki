<?php
    $trailblazerList = $result["data"]['trailblazerList'];
?>

<div class="content">
    <table class="userlist-container">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Date register</th>
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
</div>

