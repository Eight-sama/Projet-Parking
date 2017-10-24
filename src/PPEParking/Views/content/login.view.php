<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Connexion</h4></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <form method="post" action="<?= BASE_URL;?>/index.php?page=login">
                                <?= $object['form']; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>