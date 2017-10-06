
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
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
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
                                
                                <?php if($_SESSION['lvl'] > 1){ ?>     
                                <li><a href='<?php echo BASE_URL; ?>/bulletin' class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Bulletin<i class="fa fa-angle-down"></i></a>                     <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/creation_devoir">Créer un devoir</a></li>
                                     <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/bulletin">Bulletin</a></li>
                                </ul>  
                                </li>
                                <?php }elseif($_SESSION['lvl'] == 1){ ?>
                                <li><a href='<?php echo BASE_URL; ?>/bulletin'>Bulletin</a></li>
                                <?php } ?>
                                <?php if($_SESSION['lvl'] > 2){ ?>             
                                <li><a href='<?php echo BASE_URL; ?>/etablissement' class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Gestion établissement<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/ajout_eleve">Ajout profs/eleves</a></li>
                                     <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/supp_eleve">Supprimer des élèves</a></li>
                                </ul>
                                </li>
                                <?php } ?>
                                                                              
                                <li><a class='ppp' href='<?php echo BASE_URL; ?>/inbox' class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Messagerie<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/inbox">Inbox</a></li>
                                     <li><a role="menuitem" tabindex="-1" href="<?php echo BASE_URL; ?>/messagerie">Envoyer un Email</a></li>
                                </ul>
                                </li>
                                
                                
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
                   &copy; Designed by : Chhuon Moni 
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

 