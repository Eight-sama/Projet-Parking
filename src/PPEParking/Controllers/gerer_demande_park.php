<?php
require "../Model/gerer_demande_park.php";

?>
<div class="contenaire">
    <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
            <h1>Demande:</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                    </tr>
                </thead>
                <?php
                
                $req = 'SELECT * FROM user WHERE lvl = 2';
                $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $data['nom']; ?>
                            </td>
                              <td>
                                <?php echo $data['prenom']; ?>
                            </td>
                            <td> <a href='<?php echo "index.php?page=valider&id=".$data['id_u'] ; ?>''>Valider </a> </td>
                        </tr>
                    </tbody>
                    <?php
}
echo "</table>";
?>
        </div>
    </div>
</div>
<?php
        
require "../View/gerer_demande_park.php";
