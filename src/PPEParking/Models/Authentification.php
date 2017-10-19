<?php
namespace PPEParking\Models;

class Authentification{

	const ID_NOT_MEMBER = 0;
	const ID_USER = 1;
	const ID_ADMIN = 2;

    public function inscription($nom , $prenom , $mdp , $email){
        global $bdd ;

        $requete = $bdd->prepare("INSERT INTO user(nom,prenom,email,mdp)  Values(:nom ,:prenom , :email , :mdp) ");
        $requete ->bindValue(":nom",$nom,PDO::PARAM_STR);
        $requete ->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $requete ->bindValue(":email",$email,PDO::PARAM_STR);
        $requete ->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $requete->execute();

        return $requete;
    }
    public function login($mdp , $email){
        $alert="";
        global $bdd ;
        $requete = $bdd->prepare("SELECT * FROM user WHERE  email=:email  ");
        $requete ->bindValue(":email",$email,PDO::PARAM_STR);
        $requete->execute();
        if(password_verify($mdp , $requete['mdp'])){
                    $_SESSION['connecte'] = true;
                    $_SESSION['id_u'] = $reponse['id_u'];
                    $_SESSION['lvl'] = $reponse['lvl'];
            $alert= "t'es co";
            return $alert;
        }
        $alert="erreur de connexion";
        return $alert;
    }
    public function isUser($id){
        global $bdd;
        if($this->getUserInfo($id,"lvl") == self::ID_USER){
            return true;
        }
        else{
            return false;
        }
    }
    public function isAdmin($id){
        global $bdd;
        if($this->getUserInfo($id,"lvl") == self::ID_ADMIN){
            return true;
        }
        else{
            return false;
        }
    }
    public function isConnected(){
        global $bdd;
        if(isset($_SESSION) && !empty($_SESSION)){
            if(($_SESSION['lvl'] == self::ID_USER || $_SESSION['lvl'] == self::ID_ADMIN)){
                return true;
            }
        }
        else{
            return false;
        }
    }
    public function getUserInfo($id, $column){
        global $bdd;
        $requete = $bdd->prepare("SELECT ? FROM users WHERE id = ?");
        $requete->execute([$column,$id]);
        return $requete->fetch();
    }
    public function majMdp($mdp, $mdp2, $mdp3){
        global $bdd;
        $requete = $bdd->prepare("UPDATE user SET mdp = :mdp3 WHERE id_u=".$_SESSION['id']);
        $requete->execute(array('mdp3' => $mdp3));
    }
}
