<?php

function ajout_demandePlace($id){
    
    global $bdd ; 
    
    $requete = $bdd->prepare("Update user set lvl = 2 WHERE  id_u=:id ");
    $requete ->bindValue(":id",$id,PDO::PARAM_INT);
    $requete->execute();
}