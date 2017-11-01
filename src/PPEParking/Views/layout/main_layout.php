<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucapark - Le parking de vos rêves</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="<?= BASE_URL ?>/web/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="<?= BASE_URL ?>/web/css/font-awesome.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= BASE_URL ?>/web/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/web/js/alert.js"></script>
</head>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= BASE_URL; ?>/index.php?page=home">Lucapark</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <?php if ($object['user']->isConnected() && $object['user']->isAdmin($_SESSION['lvl'])): ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Administration <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if ($object['user']->isConnected() && ($object['user']->isAdmin($_SESSION['lvl']))): ?>
                                <li><a href="<?= BASE_URL; ?>/index.php?page=registerSlotApplications">Gérer les
                                        demandes de place et d'inscription</a></li>

                                <li><a href="<?= BASE_URL; ?>/index.php?page=manageSlots">Gérer les places</a></li>
                            <?php endif ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= BASE_URL; ?>/index.php?page=parkingScheme">Schéma du parking</a></li>
                            <li><a href="<?= BASE_URL; ?>/index.php?page=manageUser">Gérer les utilisateurs</a></li>
                        </ul>
                    <?php endif ?>
                </li>
                <li class="dropdown">
                    <?php if ($object['user']->isConnected() && !($object['user']->isAdmin($_SESSION['lvl']))): ?>
                        <a href="<?= BASE_URL; ?>/index.php?page=parkingScheme">Réserver une place</a>
                    <?php endif ?>
                </li>
                <li><a href="<?= BASE_URL; ?>/index.php?page=documentation">Documentation</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?= ($object['user']->isConnected()) ? '<li><a href="' . BASE_URL . '/index.php?page=profile">Profil</a></li>' : ''; ?>
                <?= ($object['user']->isConnected()) ? '<li><a href="' . BASE_URL . '/index.php?page=disconnect">Déconnexion</a></li>' : ''; ?>
            </ul>
        </div>
    </div>
</nav>

<?= $content; ?>

<script src="<?= BASE_URL ?>/web/js/bootstrap.min.js"></script>
</body>

</html>
