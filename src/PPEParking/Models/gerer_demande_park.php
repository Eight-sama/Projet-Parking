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
    
    $date_deb = date("Y-m-d H:i:s") ;  
    
    $date_explosee = explode(" ", $date_deb);
    $jmd = $date_explosee[0];
    $his = $date_explosee[1];
    
    $date_explosee = explode("-", $date_deb);
    $year = $date_explosee[0];
    $mois= $date_explosee[1];
    $jour= $date_explosee[2];
    
    
    $date_fin = mktime(0,0,0,$mois,$jour+7,$year);//durée fix a une semaine
    $date_fin = date("Y-m-d H:i:s" , $date_fin);
    
    
    if($requete->fetch()){
        
        $requete2 = $bdd->prepare("Update occuper set id_u = :id , date_deb = :date_deb , date_fin= :date_fin  WHERE id_u = 'null' limit 1 ");
        $requete2 ->bindValue(":id",$id,PDO::PARAM_INT);
        $requete2 ->bindValue(":date_deb",$date_deb,PDO::PARAM_INT);
        $requete2 ->bindValue(":date_fin",$date_fin,PDO::PARAM_INT);
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