<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
   <div class="col-xs-1">
        <button type="button" class="btn ">Reserver ma place</button>
    </div>
</div>


<div class="container">       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>rang dans la fille d'attente</th>
        <th>Nom</th>
        <th>Prenom</th>
      </tr>
    </thead>

<?php
   

session_start();//connexion bdd	
		
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","",
		array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	
	}
    catch(Exeption $e)
	{
		die("erreur de connection");
	}

    
    $req1 = "SELECT * from user where lvl_parking=1 order by rg_fa asc " ;

	
$requete1 = $bdd->query($req1);
while($data = $requete1->fetch())
{
    ?>
    <tbody>
      <tr>
        <td><?php echo  $data['rg_fa'] ; ?></td>
        <td><?php echo  $data['nom'] ; ?></td>
        <td><?php echo  $data['prenom'] ; ?></td>
      </tr>

    </tbody>
     <?php } ?>
  </table>
</div>

</body>
</html>
