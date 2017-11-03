<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Modification de l'utilisateur <b><?= ($response = $object['request']->fetch()) ? $response['surname'].' '.$response['name'] : '';?></b></h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" value="<?= $object['user']->getUserInfo($_GET['id'], 'email'); ?>" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input class="form-control" type="text" value="<?= $object['user']->getUserInfo($_GET['id'], 'surname'); ?>" id="surname" name="surname">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" value="<?= $object['user']->getUserInfo($_GET['id'], 'name'); ?>" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <?= $object['button']; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
