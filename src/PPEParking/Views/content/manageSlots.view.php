<div class="container">
    <h2>Liste des places</h2>
    <table class="table">
        <thead>
        <tr>
            <th><b># ID de la place</b></th>
            <th>Nom de la place</th>
            <th>Etat de la place</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($response = $object['request']->fetch()):?>
            <tr>
                <td><?= $response['id_s'];?></td>
                <td><?= $response['name_s'];?></td>
                <td>
                    <?= ($response['state_s'] == 0) ? "<p class='btn btn-success'>Disponible</p>" : "<p class='btn btn-danger'>Réservée</p>"; ?>
                </td>
                <td><a class="btn btn-warning" href="<?= BASE_URL; ?>/index.php?page=modifySlot&id_slot=<?= $response['id_s'];?>">Modifier</a>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>