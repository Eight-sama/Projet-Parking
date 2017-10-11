<?php
<<<<<<< HEAD
namespace Core;

class Functions{
    public function str_sub($contenu, $nb = 200)
=======
    function str_sub($contenu, $nb = 200)
>>>>>>> 6fc1799a3e0d496eea1d7f1d4940f38af9de9903
    {
        if(strlen($contenu)>200)
        {
            return substr($contenu,0,200)."...";
        }
<<<<<<< HEAD
        return $contenu;
    }
    public function verif_form($post){
        if(isset($_POST['submit'])){
            if(isset($_POST['nom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['nom'])){
                if(isset($_POST['prenom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['prenom'])){
                    if(isset($_POST['mdp']) && preg_match("#^([A-Za-z0-9]{1,})$#",$_POST['mdp'])){
                        if(isset($_POST['email'])){
                            $nom=htmlspecialchars($_POST['nom']);
                            $prenom=htmlspecialchars($_POST['prenom']);
                            $email=htmlspecialchars($_POST['email']);
                            $mdp=sha1(($_POST['mdp']));
                            inscription($nom,$prenom,$mdp,$email);

                        }
                    }
                }
            }
        }
    }
}
=======
            
        
        return $contenu;
    }
>>>>>>> 6fc1799a3e0d496eea1d7f1d4940f38af9de9903
