<?php
namespace PPEParking\Models;

class Home
{
    public function displayInfoUser()
	{
	    global $bdd;
		$request = $bdd->query("SELECT * FROM user WHERE id_u=".$_SESSION['id']);
		$response = $request->fetch();
        return $response;
    }
}