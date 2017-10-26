<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Modification de l'utilisateur <b><?= ($response = $object['request']->fetch()) ? $response['surname'].' '.$response['name'] : '';?></b></h4></div>
                <div class="panel-body">
                    <?= $object['form']; ?>
                </div>
            </div>
        </div>
    </div>
</div>