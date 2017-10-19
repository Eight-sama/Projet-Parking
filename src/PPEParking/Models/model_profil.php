<!-- form php -->
<?php
function getLogin(){
    $reqlogin = $bdd -> prepare("SELECT * FROM user WHERE login = ?");
    $reqlogin -> execute(array($login));
    return $reqlogin;
}
function majLogin($login, $nom, $prenom){
    global $bdd;
        $requete = $bdd->prepare("UPDATE user SET login = :login, nom = :nom, prenom = :prenom WHERE id_u=".$_SESSION['id']);
        $requete->execute(array(
        'login' => $login,
        'nom' => $nom,
        'prenom' => $prenom
        ));
}
function getEmail($email){
    global $bdd;
    $reqemail = $bdd->prepare("SELECT * FROM user WHERE email = ?"); 
    $reqemail->execute(array($email));
    return $reqemail;
}
function majEmail($email, $email2, $email3){
    global $bdd;
                                $requete = $bdd->prepare("UPDATE user SET email = :email3 WHERE id_u=".$_SESSION['id']);
                                $requete->execute(array(
                                'email3' => $email3
                                ));                       
}
       
function majMdp($mdp, $mdp2, $mdp3){
    global $bdd;
                            $requete = $bdd->prepare("UPDATE user SET mdp = :mdp3 WHERE id_u=".$_SESSION['id']);
                                $requete->execute(array(
                                'mdp3' => $mdp3
                                ));
}
function getMdp(){
    global $bdd;
        $reqmdp = $bdd -> query("SELECT mdp FROM user WHERE id_u =".$_SESSION['id']); 
        $repmdp = $reqmdp->fetch();
    return $repmdp;
}

    
    
?>