<?php session_start(); 

	
	try{//connexion bdd
		$bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");

	}
	catch(Exception $e)//en cas d erreur de connexion
	{
		die("erreur de connexion");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />

    <title>Minimum Bootstrap HTML Skeleton</title>
    <!--  -->
    <style>

    </style>

</head>

<body>

 <!-- Debut php connexion -->
  <?php
   if (isset($_POST['connexion']))
        {
            if(!empty($_POST['email']) AND !empty($_POST['mdp']))
        {
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars(sha1($_POST['mdp']));
            $requete = $bdd->prepare("SELECT * FROM user WHERE email = :email AND mdp = :mdp");
            $requete->bindValue(':email',$email,PDO::PARAM_STR);
            $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
            $requete->execute();
            
            
		if($reponse = $requete->fetch())
		{
			$_SESSION['connecte'] = true;
			$_SESSION['id'] = $reponse['id_u'];
			$_SESSION['level'] = $reponse['lvl'];
			header("Location:temporaire.php");
		}
		else
		{
			$message_co= "<p>Mauvais identifiant</p>";
		}
	}
            else
                $message_co= "TOUS LES CHAMPS DOIVENT ETRE REMPLIS ! ";
        }
?>
 <!-- Fin php connexion -->
 
 <!-- Debut php inscription -->
    <?php
     if(isset($_POST["inscription"]))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['email2']))
        {
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $email = htmlentities($_POST['email']);
            $email2 = htmlentities($_POST['email2']);
            $mdp = htmlentities(sha1($_POST['mdp']));
            $mdp2 = htmlentities(sha1($_POST['mdp2']));
            if($email == $email2){
            if($mdp == $mdp2)
            {
            if(preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email))
            {
                if ( preg_match ( '#^[a-z][a-z-éèçàù\']{0,18}[a-zéèçàù]$#i' , $nom ) )
                {
                    if ( preg_match ( '#^[a-z][a-z-éèçàù\']{0,18}[a-zéèçàù]$#i' , $prenom ) )
                    {
                            $reqemail = $bdd -> prepare("SELECT * FROM user WHERE email = ?"); 
                            $reqemail -> execute(array($email));
                            $existdeja = $reqemail ->rowCount(); 
                            if ($existdeja == 0) {
                                $inserer = "INSERT INTO user(mdp, nom, prenom, email) VALUES(:mdp, :nom, :prenom, :email)";
                                $reqajouter = $bdd->prepare($inserer);
                                $reqajouter->bindVALUE(':mdp', $mdp, PDO::PARAM_STR);
                                $reqajouter->bindVALUE(':nom', $nom, PDO::PARAM_STR);
                                $reqajouter->bindVALUE(':prenom', $prenom, PDO::PARAM_STR);
                                $reqajouter->bindVALUE(':email', $email, PDO::PARAM_INT);
                                $reqajouter->execute()or die(print_r($reqajouter->errorInfo())); 
                                echo "<div class='espace_gauche'>vous etes inscrit ! <a href='temporaire2.php'>Connectez-vous</a></div>";
                            }
                            else
                            {
                                $message = "Cette adresse E-Mail est déjà utilisée.";
                            }
                    }
                    else
                    {
                        $message = "Ce prenom a un format non adapté.";
                    } 
                } 
                else
                {
                    $message = "Ce nom a un format non adapté.";
                } 
            } 
            else
            {
                $message = "Cet email a un format non adapté.";
            }
            }
            else{
                $message = "Mot de passe différents.";
            }
                                
        }
            else{
                $message = "La vérification de votre adresse e-mail n'a pas fonctionné veuillez vérifier leurs syntaxe.";
            }
        }
        else{
            $message = "Tout les champs doivent êtres remplies";
        }
    }
      
?>
 <!-- Fin php inscription -->
  
   <!-- Debut form connexion -->
   <div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="panel panel-primary">
                            <div class="panel-heading">
                               CONNEXION
                            </div>
                            <div class="panel-body">
                                <form method="post">

                                     <div class="form-group">
                                                <label>Enter Email</label>
                                                <input class="form-control" type="email" name ="email" />
                                            </div>
                                                <div class="form-group">
                                                <label>Enter Password</label>
                                                <input class="form-control" type="password" name="mdp" />
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="memo">Se souvenir de moi  <!-- A configurer  -->
                                                </label>
                                            </div>
                                            <input type="submit" name="connexion" class="btn btn-primary" value="Se connecter">
                                        </form>
                                        <div class="message-erreur"><?php if(isset($message_co)){echo $message_co;} ?></div>
                                </div>
                            </div>
                                </div>
    <!-- Fin form connexion --> 
    
    <!-- Debut form inscription -->
    <div id="erreur">
        <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
    </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-primary">
                   <div class="panel-heading">Inscription</div>
                   <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control"  type="text" name="nom" value="<?php if(isset($nom)) echo $nom; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Prenom </label>
                        <input class="form-control"  type="text" name="prenom" value="<?php if(isset($prenom)) echo $prenom; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="<?php if(isset($email)) echo $email; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Confirmation Email</label>
                        <input class="form-control"  type="email" name="email2" value="<?php if(isset($email2)) echo $email2; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input class="form-control" type="password" name="mdp" pattern=".{8,}" title="8 caractères minimum"/>
                        <p class="help-block">8 Caractères minimum.</p>
                    </div>
                    <div class="form-group">
                        <label>Confirmation Mot de passe</label>
                        <input class="form-control"  type="password" name="mdp2" />
                    </div>
                    <input type="submit" name="inscription" class="btn btn-primary" value="S'inscrire">
                    <div class="message-erreur"><?php if(isset($message)){echo $message;} ?></div>
                </form>
                   </div>
                </div>
            </div>
        </div>
</div>
    
    <!-- Fin form inscription -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
    </script>
</body>

</html>