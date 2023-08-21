<?php

$playableCharacterDetail = $result["data"]['playableCharacterDetails'];
    
?>

<h1>Character Details</h1>
<!-- <ul>
    <li><a href="">Bio</a></li>
    <li><a href="">Abilities</a></li>
    <li><a href="">Ascend</a></li>
    <li><a href="">Reviews</a></li>
</ul> -->

<?php
foreach($playableCharacterDetails as $detail){
    ?>
    <section class="details-container">
        <section class="intro">
            <h2>name</h2>
            <figure>
                <img src="" alt="name"/>
            </figure>
            <span>rarity</span>
            <span>path</span>
            <span>combattype<span>
        </section>
        <section class="bio">
            <h3>Bio</h3>
            <span>sexe</span>
            <span>faction</span>
            <span>world</span>
            <span>release date</span>
        </section>
        <section class="details-abilities">
            <span>lvl</span>
            <span>type</span>
            <span>name</span>
            <span>description</span>
            <span>tag</span>
            <span>energy</span>
            <span>dmg</span>
            <span>icon</span>
        </section>
        <section class="details-eidolon">
            <span>lvl</span>
            <span>type</span>
            <span>name</span>
            <span>description</span>
            <span>icon</span>
            <span>image</span>
        </section>
        <section class="details-trace">
            <span>lvl</span>
            <span>effect</span>
            <span>material</span>
        </section>
        <section class="details-ascension">
            <span>lvl</span>
            <span>effect</span>
        </section>
        <section class="details-reviews">
            <span>rating</span>
            <span>review</span>
        </section>
    </section>
    <?php
}