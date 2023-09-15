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
                    <th>Role</th>
                </tr>
                <?php foreach ($trailblazerList as $trailblazer){ ?>
                    <tr>
                        <td class="center"><?= $trailblazer->getId() ?></td>
                        <td class="center"><?= $trailblazer->getUsername() ?></td>
                        <td class="center"><?= $trailblazer->getEmail() ?></td>
                        <td class="center"><?= $trailblazer->getDateRegister() ?></td>
                        <td class="center <?= ($trailblazer->getRole() == 'ROLE_BAN') ? 'banned' : ''; ?>"><?= $trailblazer->getRole() ?><button onClick="reply_click(<?= $trailblazer->getId() ?>)" id="modifyRoleBtn">Modify</button></td>
                        <td class="center"><a href="index.php?ctrl=admin&action=deleteUser&id=<?= $trailblazer->getId() ?>">Delete</a></td>
                    </tr>
                    <?php } ?>   
                </table>
            <!-- Pagination -->
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
                    <img class='error-msg-emote' src='/StarRailWiki/appli/public/img/emotes/danHeng-surprised.png' alt='emote Dan Heng surprise !' />
                </figure>
                <p class='error-msg'>There's...no member ?</p> 
            </div>
        <?php } 
    } ?>
    <!--  Modal  -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <span class="text-modal">Change the role : </span>
            <form id='updateRole' action="index.php?ctrl=admin&action=updateRole&id=<?= $id ?>" method="POST">
                <label class="text-modal">Member
                    <input type='radio' id='updateRoleMember' name='roleUser' value='ROLE_MEMBER' required/>
                </label>
                <label class="text-modal">Admin
                    <input type='radio' id='updateRoleAdmin' name='roleUser' value='ROLE_ADMIN' required/>
                </label>
                <label class="text-modal">Ban
                    <input type='radio' id='updateRoleBan' name='roleUser' value='ROLE_BAN' required/>
                </label>
                <input class="add-submit" type="submit" form="updateRole" name="updateRole" value="Confirm">
            </form>
        </div>
    </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function reply_click($idUser)
    {
        modal.style.display = "block";
        $id = $idUser;
    }
</script> 