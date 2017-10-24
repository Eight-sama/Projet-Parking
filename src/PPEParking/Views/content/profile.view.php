<section id="user-space">
    <div class="container">
        <div class="row">
            <h1>Bonjour Théo</h1>
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
                            <form method="post">
                                <br>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" name="email"
                                           value="<?= $object['user']->getUserInfo($_SESSION['id'], 'email'); ?>"/>
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
                                <button class="btn btn-default" type="submit" name="case1"><i
                                            class="fa fa-refresh "></i>Mettre à jour
                                </button>
                            </form>
                            <?php if (isset($message_co)) {
                                echo $message_co;
                            } ?>
                        </div>
                        <div class="tab-pane fade" id="mdp">
                            <form method="post">
                                <br>
                                <div class="form-group">
                                    <label for="">Ancien mot de passe </label><input class="form-control"
                                                                                     type="password" name="password"
                                                                                     value=""/>
                                </div>
                                <div class="form-group">
                                    <label for="">Nouveau mot de passe </label><input class="form-control"
                                                                                      type="password" name="password2"
                                                                                      value=""/></div>
                                <div class="form-group">
                                    <label for="">Confirmez le mot de passe</label><input class="form-control"
                                                                                          type="password"
                                                                                          name="password3" value=""/>
                                </div>
                                <br>
                                <button class="btn btn-default" type="submit" name="case3"><i
                                            class=" fa fa-refresh "></i> Mettre à jour
                                </button>
                            </form>
                            <?php if (isset($message_case2)) {
                                echo $message_case2;
                            } ?>
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