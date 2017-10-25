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
                       class="btn btn-primary parking-scheme-reservation col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <?php while ($response = $object['request_b']->fetch()): ?>
                    <a href="#" id="<?= $response['id_s']; ?>"
                       class="btn btn-primary parking-scheme-reservation col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin:10px;">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <?php while ($response = $object['request_c']->fetch()): ?>
                    <a href="#" id="<?= $response['id_s']; ?>"
                       class="btn btn-primary parking-scheme-reservation col-xs-1 <?= ($response['state_s'] == 1) ? 'disabled' : ''; ?>"><?= $response['name_s']; ?></a>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>
<div id="myalertbox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p id="modal-text"></p>
                <a id="yes" class="btn btn-success" href="">Oui</a>&nbsp;<a class="btn btn-danger" data-dismiss="modal">Non</a>
            </div>
        </div>
    </div>
</div>
