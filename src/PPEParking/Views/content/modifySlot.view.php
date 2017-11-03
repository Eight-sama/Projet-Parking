<div class="container">
    <h2>Informations de la place</h2>
    <div class="row">
        <div class="col-md-12">
            <form action="">
               <?php if($response = $object['request']->fetch()): ?>
                <div class="form-group">
                    <label for="">Nom de la place</label>
                    <input class="form-control" value="<?= $response['name_s'];?>" disabled type="text">
                </div>
                <div class="form-group">
                    <label for="">Etat de la place</label>
                    <input class="form-control" value="<?= ($response['state_s'] == 0) ? 'Disponible' : 'Indisponible';?>"disabled type="text">
                </div>
                <div class="form-group">
                    <label for="">Utilisateur</label>
                    <input class="form-control" disabled type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Mettre à jour</button>
                </div>
                <?php endif ?>
            </form>
        </div>
        <div class="col-md-12">

        </div>
    </div>
</div>
