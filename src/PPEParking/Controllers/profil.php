<!-- form php -->

<?php require "../models/model_profil.php"; ?>

<?php 
        if (isset($_POST['case1']))
        {
            if(!empty($_POST['login']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
        {
                
                $login = htmlspecialchars($_POST['login']);
                $nom= htmlspecialchars($_POST['nom']);
                $prenom= htmlspecialchars($_POST['prenom']);
                if ( preg_match ( '#^[a-z][a-z-éèçàù\']{0,18}[a-zéèçàù]$#i' , $nom ) )
                {
                    if ( preg_match ( '#^[a-z][a-z-éèçàù\']{0,18}[a-zéèçàù]$#i' , $prenom ) )
                    {
                            getLogin();
                            $existdeja = $reqlogin ->rowCount(); 
                            if ($existdeja == 0) {
                                
                                majLogin($login, $nom, $prenom);
                                
                                header("Location:index.php");
                            }
                                else
                                {
                                    $message_co = "Ce Pseudo est déjà utilisé.";
                                }
                    }
                    else
                    {
                        $message_co = "Ce prenom a un format non adapté.";
                    } 
                } 
                else
                {
                    $message_co = "Ce nom a un format non adapté.";
                } 
		}
		else
		{
                $message_co= "TOUS LES CHAMPS DOIVENT ETRE REMPLIS ! ";
        }
        }
?>

<?php 
        if(isset($_POST["case2"]))
    {
        if(!empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['email3']))
        {
            $email = htmlentities($_POST['email']);
            $email2 = htmlentities($_POST['email2']);
            $email3 = htmlentities($_POST['email3']);
            if($email2 == $email3)
            {
            if(preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email))
            {
                if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email2) )
                {
                    if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email3) )
                    {
                            getEmail($email);
                        
                            $existdeja = $reqemail ->rowCount(); 
                            if ($existdeja == 0) {
                                
                                majEmail($email, $email2, $email3);
                                
                                header("Location:index.php");
                                    
                                }
                                else
                                {
                                    $message_case2 = "Cette adresse e-mail est déjà utilisé.";
                                }
                            }
                            else
                            {
                                $message_case2 = "Cette adresse e-mail n'est pas conforme";
                            }
                    }
                    else
                    {
                        $message_case2 = "Cette adresse e-mail n'est pas conforme";
                    } 
                } 
                else
                {
                    $message_case2 = "Cette adresse e-mail n'est pas conforme";
                } 
            } 
            else
            {
                $message_case2 = "Les 2 adresses e-mail ne correspondent pas";
            }
            }
            else{
                $message_case2 = "Tous les champs doivent être remplis";
            }
                                
        }
        
?>


<?php 
        if(isset($_POST["case3"]))
    {
        if(!empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['mdp3']))
        {
            $mdp = htmlentities(sha1($_POST['mdp']));
            $mdp2 = htmlentities(sha1($_POST['mdp2']));
            $mdp3 = htmlentities(sha1($_POST['mdp3']));
            if($mdp2 == $mdp3)
            {
                            getMdp();
                
                            if($repmdp['mdp'] == $mdp)
                            {
                                if($mdp!=$mdp2)
                                {
                                    
                                majMdp($mdp, $mdp2, $mdp3);
                                    
                                header("Location:index.php");
                                }
                                else
                                {
                                    $message_case3 = "Le nouveau mot de passe doit être différent de l'ancien";
                                }
                                }
                                else
                                {
                                    $message_case3 = "Ce mot de passe ne correspond pas";
                                }
            } 
            else
            {
                $message_case3 = "Les 2 adresses e-mail ne correspondent pas";
            }
            }
            else{
                $message_case3 = "Tous les champs doivent être remplis";
            }
                                
        }
        
?>



<?php require "../views/view_profil.php"; ?>