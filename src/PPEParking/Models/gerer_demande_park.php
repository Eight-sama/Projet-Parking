<?php

function afficher_demande(){
    
        global $bdd;
    
        $req = 'SELECT * FROM user WHERE lvl = 2';
        $requete = $bdd->query($req);
    
        return ($data = $requete->fetch());
    }



function valider_reserv($id){
    
    global $bdd;
    
    $alert = "" ; 
    
    $req = "SELECT * FROM occuper WHERE id_u = 'null'  ";
    $requete = $bdd->query($req);

    if($requete->fetch()){
        
        $requete2 = $bdd->prepare("Update occuper set id_u = :id WHERE id_u = 'null' limit 1 ");
        $requete2 ->bindValue(":id",$id,PDO::PARAM_INT);
        $requete2->execute();
        
        $requete5 = $bdd->prepare("Update user set lvl = 4 where id_u = :id ");
        $requete5 ->bindValue(":id",$id,PDO::PARAM_INT);
        $requete5->execute();
         
    }
    else{
        $requete3 = $bdd->prepare("Update user set lvl = 3 ,  rg_fa = (select Max(rg_fa) from (Select * from user) as dtg )+1 where id_u = :id");
        $requete3 ->bindValue(":id",$id,PDO::PARAM_INT);
        $requete3->execute();
        
    }
}
