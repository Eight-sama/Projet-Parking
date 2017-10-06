<h1>Les derniers articles</h1>


<?php
    foreach($articles as $article)
    {
    ?>
    <a href="<?=BASE_URL;?>/article/<?=$article['id'];?>"><h2><?= $article['titre'];?></h2></a>
    <p><?= $article['contenu']; ?></p>
    <?php
    }
?>