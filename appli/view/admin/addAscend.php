<?php
    $playableCharacterList = $result['data']['playableCharacterList'];
?>

<div class="content">
    <?php if(App\Session::isAdmin()){ ?>
        <section class="navbar-details">
            <a class="link-details" href="index.php?ctrl=security&action=viewProfile&id=<?= App\Session::getUser()->getId() ?> ">Profile</a>
            <a class="link-details" href="index.php?ctrl=admin&action=trailblazerList">User List</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addCharacterView">Add Character</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addAbilityView">Add Abilities</a>
            <a class="link-details" href="index.php?ctrl=admin&action=addAscendView">Add Ascend</a>
        </section>
        <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
            
            <div class ="form-admin-container">
                <h1>Add a new Eidolon</h1>
                <form class="form" id="addEidolon" action="index.php?ctrl=admin&action=addAscendEidolon" method="POST">
                    <div class="input-required">
                        <select name="playableCharacter" id="playableCharacter" required>
                            <option>--Chose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                    echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>

                        <label for="nbr">Number :</label>
                        <input type="int" name="nbr" id="nbr" required>

                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Enter Eidolon name" required>

                        <label for="effect">Effect :</label>
                        <input type="text" name="effect" id="effect" placeholder="What's the effect of that Eidolon" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAscendEidolon" name="submit" value="Add that new Eidolon to a character">
<!-- Second form -->
                <h1>Add a new Trace</h1>
                <form class="form" id="addAscendTrace" action="index.php?ctrl=admin&action=addAscendTrace" method="POST">
                    <div class="input-required">
                        <select name="playableCharacter" id="playableCharacter" required>
                            <option>--Chose a character--</option>
                            <?php 
                                foreach($playableCharacterList as $playableCharacter){
                                    $id = $playableCharacter->getId();
                                    $name = $playableCharacter->getName();
                                    echo "<option value=\"$id\">$id - $name</option>";
                                }
                            ?>
                        </select>

                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" required>

                        <label for="effect">Effect :</label>
                        <input type="text" name="effect" id="effect" placeholder="What's the effect of that Eidolon" required>
                    </div>
                    <div class="input-not-required">
                        <label for="image-url">Image url :</label>
                        <input type="text" name="image-url" id="image-url" placeholder="https://star-rail-image-url.png">
                    </div>
                </form>
                <input class="add-submit" type="submit" form="addAscendTrace" name="submit" value="Add that new Trace to a character">
            </div>
        <?php endif; 
    } ?>
</div>