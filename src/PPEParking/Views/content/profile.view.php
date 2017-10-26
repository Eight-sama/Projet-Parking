<section id="user-space">
    <div class="container">
        <div class="row">
            <h1>Bonjour <?= $object['user']->getUserInfo($_SESSION['id'], 'name'); ?></h1>
            <br>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Informations personnelles
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#login" data-toggle="tab">Infos personnelles</a>
                        </li>
                        <li class=""><a href="#mdp" data-toggle="tab">Mot de passe</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="login">
                            <form id="form-modify" action="#" method="post">
                                <br>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                           value="<?= $object['user']->getUserInfo($_SESSION['id'], 'email'); ?>"/>
                                </div>
                                <div class="form-group">
                                    <div id="error_email" style="color:red;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="surname">Nom</label>
                                    <input class="form-control" type="text" name="surname"
                                           value="<?= $object['user']->getUserInfo($_SESSION['id'], 'surname'); ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Prénom</label>
                                    <input class="form-control" type="text" name="name"
                                           value="<?= $object['user']->getUserInfo($_SESSION['id'], 'name'); ?>"/>
                                </div>
                                <br>
                                <button class="btn btn-default" type="submit" name="submit"><i
                                            class="fa fa-refresh "></i> Mettre à jour
                                </button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="mdp">
                            <form id="form-modify-2" action="#" method="post">
                                <br>
                                <div class="form-group">
                                    <label for="">Nouveau mot de passe </label><input class="form-control" id="password" type="password" name="password" value=""/></div>                                    
                                <div class="form-group">
                                    <label for="">Confirmez le mot de passe</label><input class="form-control" id="password2" type="password" name="password2" value=""/>
                                </div>
                                <div class="form-group">
                                    <div id="error_pwd" style="color:red;"></div>
                                </div>
                                <br>
                                <button class="btn btn-default" type="submit" name="submit"><i
                                            class=" fa fa-refresh "></i> Mettre à jour
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <span>Vos demandes de places en cours</span>
                </div>
                <div class="panel-body">
                    <div class="panel">
                        <span><b>Demande de la place : B-21</b></span>
                        <br>
                        <small>Effectuée le 10-08-2017 à 22:15</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span>Vos places</span>
                </div>
                <div class="panel-body">
                    <div class="panel">
                        <span><b>Place : B-21</b></span>
                        <br>
                        <small>Réservée jusqu'au 15-08-2017 à 22:15</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>