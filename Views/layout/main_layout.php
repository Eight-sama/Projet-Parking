<<<<<<< HEAD
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucapark - Le parking de vos rêves</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand" href="#">Lucapark</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= BASE_URL;?>/index.php?p=register_applications">Voir les demandes d'inscription</a></li>
                            <li><a href="#">Voir les demandes de place</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Schéma du parking</a></li>
                            <li><a href="#">Gestion des utilisateurs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Réserver une place</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Inscription / Connexion</a></li>
                    <li><a href="#">Documentation</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?= $content; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
=======

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>INTRANET</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?= BASE_URL ?>/Views/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="<?= BASE_URL ?>/Views/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= BASE_URL ?>/Views/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googloeapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="<?= BASE_URL ?>/index">

                    <img src="<?= BASE_URL ?>/assets/img/logo.png" />
                </a>

            </div>

            <div class="right-div">
               <?php if(isset($_SESSION['connecte']) AND isset($_SESSION['id'])) 
                { ?>
                
                                
                <a href="<?= BASE_URL ?>/deconnexion" class='btn btn-info pull-right'>DECONNEXION</a>
                 <?php } ?>
                
                
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <?php if(isset($_SESSION['connecte']) AND isset($_SESSION['id'])) 
                            { ?>
                                
                                <li><a href='<?php echo BASE_URL; ?>/index' >Acceuil</a></li>
                                <li><a href='<?php echo BASE_URL; ?>/reservation' >Réservation</a></li>
                                <li><a href='<?php echo BASE_URL; ?>/contact' >Contact</a></li>
                                
                                <li><a class='ppp' href='<?php echo BASE_URL; ?>/profil'>Profil</a></li>
                                
                            <?php } 
                            else
                                echo "<div class='cache'><li><a>juste de quoi tenir la forme.</a></li></div>";
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
 <!-- fin du head -->
  <?php echo $content; ?>
     
           
   
  <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; Designed by : Chhuon Moni, Leveque Luc & Huchard Théo
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>

 
>>>>>>> 6fc1799a3e0d496eea1d7f1d4940f38af9de9903
