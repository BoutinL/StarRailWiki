<?php
    $links =  '<link rel="stylesheet" href="public/css/admin/styleTrailblazerList.css">';

    $trailblazerList = $result["data"]['trailblazerList'];

    // pagination side
    $pages = $result["data"]['pages'];
    $currentPage = $result["data"]['currentPage'];
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
        <?php if($trailblazerList){ ?>
                <table class="userlist-container table-profile">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>DateRegister</th>
                    </tr>
                    <?php foreach ($trailblazerList as $trailblazer){ ?>
                        <tr>
                            <td class="center"><?= $trailblazer->getId() ?></td>
                            <td class="center"><?= $trailblazer->getUsername() ?></td>
                            <td class="center"><?= $trailblazer->getEmail() ?></td>
                            <td class="center"><?= $trailblazer->getDateRegister() ?></td>
                        </tr>
                    <?php } ?>   
                </table>
                <div class="pagination-box">
                    <ul class="pagination">
                        <li class="link-details <?= ($currentPage == 1) ? 'disabled' : '' ?>"><a href="index.php?ctrl=admin&action=trailblazerList&page=<?= $currentPage - 1 ?>"><</a></li>
                        <?php for($page = 1; $page <= $pages; $page++){ ?>
                            <li class="link-details">
                                <a class="<?= ($currentPage == $page) ? 'active' : ''?>" href="index.php?ctrl=admin&action=trailblazerList&page=<?= $page ?>"><?= $page ?></a>
                            </li>
                        <?php } ?>
                        <li class="<?= ($currentPage == $pages) ? 'disabled' : 'link-details'?>"><a href="index.php?ctrl=admin&action=trailblazerList&page=<?= $currentPage + 1?>">></a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <div class='container-error-msg'>
                    <figure class='container-msg-emote'>
                        <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/gepard-ashamed' alt='' />
                    </figure>
                    <p class='error-msg'>We're sorry but there's no data yet !</p> 
                </div>
            <?php } 
    } ?>
</div>