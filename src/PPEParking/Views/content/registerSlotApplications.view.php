<section id="register-applications">
    <div class="container">
        <div class="row">
            <h2>Demandes d'inscriptions</h2>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des demandes d'inscriptions</div>
                <div class="panel-body">
                    <?php while ($response = $object['request']->fetch()): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span><h4>Demande pour l'<b>utilisateur n° <?= $response['id_u']; ?></b></h4></span>
                            </div>
                            <div class="panel-body">
                                <span><small><?= $response['name']; ?>
                                        &nbsp;<?= $response['surname']; ?></small></span><br>
                                <span><small><?= $response['email']; ?></small></span><br>
                                <span><small>Effectuée le <?= $response['date_register']; ?></small></span>
                                <br><br>
                                <a href="<?= BASE_URL; ?>/index.php?page=registerSlotApplications&accept=1&id=<?= $response['id_u']; ?>"><i
                                            class="btn btn-success fa fa-plus"></i></a>&nbsp;&nbsp;&nbsp;<a
                                        href="<?= BASE_URL; ?>/index.php?page=registerSlotApplications&refuse=1&id=<?= $response['id_u']; ?>"><i
                                            class="btn btn-danger fa fa-remove"></i></a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<section id="slot-applications">
    <div class="container">
        <div class="row">
            <h2>Demandes de places</h2>
        </div>
        <div class="row">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation"><a class="btn btn-primary" href="#onmodif">Voir les demandes en cours</a></li>
                <li role="presentation"><a class="btn btn-success" href="#accepted">Voir les demandes acceptées</a></li>
                <li role="presentation"><a class="btn btn-danger" href="#refused">Voir les demandes refusées</a></li>
            </ul>
        </div>
        <br>
        <div class="row">
            <div id="onmodif" class="panel panel-primary">
                <div class="panel-heading">
                    Liste des demandes de places en cours
                </div>
                <div class="panel-body">
                    <?php while ($response = $object['request_on']->fetch()): ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span><h4>Demande pour la place <?= $response['name_s'];?></b></h4></span>
                            </div>
                            <div class="panel-body">
                                <span><small>Demande effectuée par <?= $response['surname']." ".$response['name'];?> le <?= $response['date_r_deb']; ?></small></span>
                                <br><br>
                                <a href="<?= BASE_URL; ?>/index.php?page=registerSlotApplications&acceptSlot=1&id=<?= $response['id_u']; ?>&id_slot=<?= $response['id_s'];?>"><i
                                            class="btn btn-success fa fa-plus"></i></a>&nbsp;&nbsp;&nbsp;<a
                                        href="<?= BASE_URL; ?>/index.php?page=registerSlotApplications&refuseSlot=1&id=<?= $response['id_u']; ?>&id_slot=<?= $response['id_s'];?>"><i
                                            class="btn btn-danger fa fa-remove"></i></a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
            <div id="accepted" class="panel panel-success">
                <div class="panel-heading">
                    Liste des demandes de places acceptées
                </div>
                <div class="panel-body">
                    <?php while ($response = $object['request_accepted']->fetch()): ?>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <span><h4>Demande pour la place <?= $response['name_s'];?></b></h4></span>
                            </div>
                            <div class="panel-body">
                                <span><small>Demande effectuée par <?= $response['surname']." ".$response['name'];?> le <?= $response['date_r_deb']; ?></small></span>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
            <div id="refused" class="panel panel-danger">
                <div class="panel-heading">
                    Liste des demandes de places refusées
                </div>
                <div class="panel-body">
                    <?php while ($response = $object['request_denied']->fetch()): ?>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <span><h4>Demande pour la place <?= $response['name_s'];?></b></h4></span>
                            </div>
                            <div class="panel-body">
                                <span><small>Demande effectuée par <?= $response['surname']." ".$response['name'];?> le <?= $response['date_r_deb']; ?></small></span>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>
</section>