<div class="container">
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <h2>Schéma du parking</h2>
            </div>
        </div>
    </div>
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <?php while ($response = $object['request_a']->fetch()): ?>
                    <a href="#" id="<?= $response['id_s']; ?>"
                       class="btn btn-primary parking-scheme-reservation-a col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                    <div id="myalertbox-a" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    hello world !
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-parimary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <?php while ($response = $object['request_b']->fetch()): ?>
                    <a href="#" id="<?= $response['id_s']; ?>"
                       class="btn btn-primary parking-scheme-reservation-b col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                    <div id="myalertbox-b" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    hello world !
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-parimary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <?php while ($response = $object['request_c']->fetch()): ?>
                    <a href="#" id="<?= $response['id_s']; ?>"
                       class="btn btn-primary parking-scheme-reservation-c col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                    <div id="myalertbox-c" class="modal fade <?= $response['id_s'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    Bonjour, souhaitez-vous réserver la place <?= $response['name_s']; ?> ? <br><br>
                                    <a class="btn btn-success" href="">Oui</a>&nbsp;<a class="btn btn-danger" href="">Non</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-parimary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>
