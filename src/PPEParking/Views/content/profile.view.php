<section id="view-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Informations personnelles
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#login" data-toggle="tab">Infos personnelles</a>
                            </li>
                            <li class=""><a href="#email" data-toggle="tab">Email</a>
                            </li>
                            <li class=""><a href="#mdp" data-toggle="tab">Mot de passe</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="login">
                                <form method="post">
                                    <label for=""><h4>Email:</h4></label>
                                    <input class="form-control" type="text" name="login" value="<?= $object['user']->getUserInfo($_SESSION['id'], 'email'); ?>"/>
                                    <h4>Nom:<input class="form-control" type="text" name="nom"
                                                   value="<?php echo $rep['nom']; ?>"/></h4>
                                    <h4>Prénom:<input class="form-control" type="text" name="prenom"
                                                      value="<?php echo $rep['prenom']; ?>"/></h4>
                                    <button class="btn btn-default" type="submit" name="case1"><i class="fa fa-refresh "></i>Update</button>
                                </form>
                                <?php if (isset($message_co)) {
                                    echo $message_co;
                                } ?>
                            </div>
                            <div class="tab-pane fade" id="email">
                                <form method="post">
                                    <h4>Ancien E-mail:<input class="form-control" type="email" name="email" value=""/>
                                    </h4>
                                    <h4>Nouvelle E-mail:<input class="form-control" type="email" name="email2"
                                                               value=""/></h4>
                                    <h4>Confirmez:<input class="form-control" type="email" name="email3" value=""/></h4>
                                    <button class="btn btn-default" type="submit" name="case2"><i
                                                class=" fa fa-refresh "></i> Update
                                    </button>
                                </form>
                                <?php if (isset($message_case2)) {
                                    echo $message_case2;
                                } ?>
                            </div>
                            <div class="tab-pane fade" id="mdp">
                                <form method="post">
                                    <h4>Ancien mot de passe:<input class="form-control" type="password" name="mdp"
                                                                   value=""/></h4>
                                    <h4>Nouveau mot de passe:<input class="form-control" type="password" name="mdp2"
                                                                    value=""/></h4>
                                    <h4>Confirmez:<input class="form-control" type="password" name="mdp3" value=""/>
                                    </h4>
                                    <button class="btn btn-default" type="submit" name="case3"><i
                                                class=" fa fa-refresh "></i> Update
                                    </button>
                                </form>
                                <?php if (isset($message_case3)) {
                                    echo $message_case3;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>