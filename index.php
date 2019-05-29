<?php

    require 'functions/main.functions.php';

    // scanne le fichier 
    $pages = scandir('pages/');
    //recherche via la méthode get si le fichier existe dans le répertoire 
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        //Si la page existe on renvoie le contenu sinon on renvoie le contenu du fichier 
        //error
        if (in_array($_GET['page'].'.php', $pages)) {
            $page = $_GET['page'];
        } else {
            $page = "error";
        }
    // Sinon on renvoie la page d'accueil
    }else{
        $page = "home";
    }

    // test avec le dossier function 

    $pages_functions = scandir('functions/');
    //si une page comporte une extension .funct elle doit être prise en compte
    if (in_array($page.'.func.php' ,$pages_functions)) {
        include 'functions/'.$page.'.func.php';
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <title>Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <?php
            include "body/topbar.php";
        ?>
        <div class="container">
            <?php
                include 'pages/'.$page.'.php';
            ?>
        </div>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        
        <?php
            // test avec le dossier function 
            $pages_js = scandir('js/');
            //si une page comporte une extension .funct elle doit être prise en compte
            if (in_array($page.'.func.js' ,$pages_js)) {
                ?>
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
                <?php
            }
        ?>
    </body>
</html>
