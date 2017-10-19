<?php
namespace PPEParking\Models;

class Home
{
    public function afficherInfoUser()
	{
	    global $bdd;
		$req = $bdd->query("SELECT * FROM user WHERE id_u=".$_SESSION['id']);
		$rep = $req->fetch();
        return $rep;
    }
}