<?php 

if($response = $object['request_check']->fetch()) { ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>
                <p>Vous avez déja demandé pour cette place, veuillez en choisir une autre...</p>
            </h1>
        </div>
    </div>
</div>

<?php } else { ?>


<?php if($response = $object['request_nb']->fetch())
{
        do{ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>
                <p>Il y a actuellement
                    <?= $response['nb'] ?> personnes réservant cette places êtes vous sur de vouloir celle-ci ? </p>
            </h1>
        </div>
        <div class="col-md-12 text-center">
            <a href="index.php?page=confirmSlotApp&id_slot=<?= $_GET['id_nb']; ?>"><button type="button" class="btn btn-success">Oui</button></a>
            <a href="index.php?page=parkingScheme"><button type="button" class="btn btn-danger">Non</button></a>
        </div>
    </div>
</div>
<?php } while($response = $object['request_nb']->fetch()); 
           } 
             }
?>