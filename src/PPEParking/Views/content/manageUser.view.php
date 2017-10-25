<div class="container">
    <h2>Liste des utilisateurs</h2>
    <table class="table">
        <thead>
        <tr>
            <th><b># ID</b></th>
            <th>Surname</th>
            <th>Name</th>
            <th>Email</th>
            <th>Slot owned</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($response = $object['request']->fetch()):?>
            <tr>
                <td><?= $response['id_u'];?></td>
                <td><?= $response['surname'];?></td>
                <td><?= $response['name'];?></td>
                <td><?= $response['email'];?></td>
                <td><?= $response['slot_owned'];?></td>
                <td><a class="btn btn-warning" href="<?= BASE_URL; ?>/index.php?page=modifyUser&id=<?= $response['id_u'];?>">Modifier</a>
                    &nbsp;
                    <?php if($response['lvl'] != 2): ?>
                    <a class="btn btn-danger" href="<?= BASE_URL; ?>/index.php?page=banUser&id=<?= $response['id_u'];?>">Bannir</a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>