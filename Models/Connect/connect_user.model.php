<?php
namespace Models\Connect;
    
class ConnectUser{
    
    public function inscription($nom , $prenom , $mdp , $email){
        
        global $bdd;
        
        $requete = $bdd->prepare("INSERT INTO user(nom,prenom,email,mdp)  Values(:nom ,:prenom , :email , :mdp) ");
        $requete ->bindValue(":nom",$nom,PDO::PARAM_STR);
        $requete ->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $requete ->bindValue(":email",$email,PDO::PARAM_STR);
        $requete ->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $requete->execute();
        
        return $requete;
    }
    public function login($mdp , $email){
        
        global $bdd;
        
        $requete = $bdd->prepare("SELECT * FROM user WHERE  email=:email  ");
        $requete ->bindValue(":email",$email,PDO::PARAM_STR);
        $requete->execute();
        if(password_verify($mdp , $requete['mdp'])){
            $_SESSION['connecte'] = true;
            $_SESSION['id_u'] = $reponse['id_u'];
            $_SESSION['lvl'] = $reponse['lvl'];
            
        }
    }
}
?>
