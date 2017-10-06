<html>

<head>
    <title>PPE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/zoombox.js"></script>
</head>

<body>
    <div class="menu">
        <nav class="droite">
            <ul>
                <li class="gau"> Luc Leveque dev Developper</li>
                
                    <li><a href='<?php echo BASE_URL; ?>/index'>Accueil</a></li>
                    <li><a href='<?php echo BASE_URL; ?>/projet'>Projets</a></li>
                    <li><a href='<?php echo BASE_URL; ?>/contact'>Contact</a></li>
                    <
                    <li><a href='<?php echo"index.php?page=logout"?> '>Logout</a></li>
                        <li><a href='index.php?page=connexion'>Connexion</a></li>
                    
            </ul>
        </nav>
    </div>
    
   <?php 
        echo $contenu;
    ?>




 