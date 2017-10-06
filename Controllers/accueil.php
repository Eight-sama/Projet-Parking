<?php
    require "models/accueil.php";

    $title = "Accueil";

    $articles = get_last_articles(0,5);
    
    foreach($articles as $k => $v)
    {
        $articles[$k]['contenu'] = str_sub($articles[$k]['contenu']);
    }
    
    require "views/accueil.php";
?>