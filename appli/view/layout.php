<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="language" content="eng">
    <meta name="description" content="A community-driven Star Rail game wiki website, dedicated to fans of the game.
    Explore and contribute to a wealth of information, strategies, and lore related to the Star Rail universe.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Honkai, Star Rail, Wiki, Hoyoverse">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,400;0,600;1,100;1,200;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/vnd.icon" href="/StarRailWiki/appli/public/img/level_star.png">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Dynamic css -->
    <?php 
        $links = (isset($links)) ? $links : null;
        echo $links;
    ?>
    <title>Star Rail Wiki</title>
</head>
<body>
    <div class="main" id="wrapper"> 
        <div id="mainpage">
            <!-- Where error / succes are display -->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
            <nav class="nav">
                <div class="nav-left" id="nav-left">
                    <a class="nav-links" href="index.php?ctrl=home&action=index"><img class="icon-nav" src="/StarRailWiki/appli/public/img/Honkai-Star-Rail-icon.png" alt="Home Star rail icon" /></a>
                    <a class="nav-links" href="index.php?ctrl=wiki&action=characterList">Character</a>
                    <a class="nav-links" href="">Topic</a>
                    <a class="nav-links" href="">Banners</a>
                </div>
                <div class="nav-right" id="nav-right">
                    <?php
                    if(App\Session::getUser() && App\Session::getUser() !== null){
                        ?>
                        <a class="nav-links" href="index.php?ctrl=security&action=viewProfile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()->getUsername()?></a>
                        <a class="nav-links-exit" href="index.php?ctrl=security&action=logout"><span class="fa-solid fa-right-from-bracket"></span>&nbsp;Logout</a>
                        <?php
                    } else { ?>
                    <a class="nav-links" href="index.php?ctrl=security&action=login">Login</a>
                    <a class="nav-links" href="index.php?ctrl=security&action=register">Register</a>
                    <?php } ?>
                </div>
                <!-- Ajout du bouton burger -->
                <div class="burger-menu" id="burger-menu">&#9776;</div>
            </nav>
            </header>
            <main id="main">
                <?= $page ?>
            </main>
        </div>
        <footer>
            <span class="footer">&copy; 2023 - Star Rail Wiki : <a class="link-unstyled" href="index.php?ctrl=legality&action=rules"> Rules </a> - <a class="link-unstyled" href="index.php?ctrl=legality&action=legalNotice"> Legal Notice </a> - <a class="link-unstyled" href="index.php?ctrl=legality&action=privacyPolice"> Privacy Police </a></span>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        document.getElementById('burger-menu').addEventListener('click', function() {
            var nav = document.querySelector('.nav');
            nav.classList.toggle('active');
        });


        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>
</html>