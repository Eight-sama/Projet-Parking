<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucapark - Le parking de vos rêves</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="<?= BASE_URL ?>/web/css/bootstrap.min.css">

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
                            <li><a href="<?= BASE_URL;?>/index.php?p=registerApplications">Voir les demandes d'inscription</a></li>
                            <li><a href="<?= BASE_URL;?>/index.php?p=slotsApplications">Voir les demandes de place</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= BASE_URL;?>/index.php?p=parkingScheme">Schéma du parking</a></li>
                            <li><a href="<?= BASE_URL;?>/index.php?p=manageUser">Gestion des utilisateurs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="<?= BASE_URL;?>/index.php?p=slotsApplications">Réserver une place</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <?= $this->eIf($this->getMod()->isConnected(),'<li><a href="<?= BASE_URL;?>/index.php?p=userSpace">Profil</a></li>',''); ?>
                    <li><a href="<?= BASE_URL;?>/index.php?p=login_register_applications">Inscription / Connexion</a></li>
                    <li><a href="<?= BASE_URL;?>/index.php?p=documentation">Documentation</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?= $content; ?>

    <script src="<?= BASE_URL ?>/web/js/jquery-3.2.1.min.js"></script>
    <script src="<?= BASE_URL ?>/web/js/custom.js"></script>
    <script src="<?= BASE_URL ?>/web/js/bootstrap.min.js"></script>
</body>

</html>