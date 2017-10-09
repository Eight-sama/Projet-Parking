<?php

namespace Models;

class Home{
    
    public function get_last_articles($deb = 0, $fin = 5)
    {
        global $bdd;

        $requete = $bdd->prepare("SELECT * FROM articles LIMIT :deb, :fin");
        $requete->bindValue(":deb",$deb,PDO::PARAM_INT);
        $requete->bindValue(":fin",$fin,PDO::PARAM_INT);
        $requete->execute();

        return $requete->fetchAll();        
    }

    public function displayArticle($id)
    {
        global $bdd;

        $requete = $bdd->prepare("SELECT * FROM articles WHERE id = :id");
        $requete->bindValue(":id", $id,PDO::PARAM_INT);
        $requete->execute();

        return $requete->fetch();
    }
    
}

?>