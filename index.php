<<<<<<< HEAD
<?php session_start();//connexion bdd	
		
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=rs;charset=utf8","root","");
	
	}
		catch(Exeption $e)
	{
		die("erreur de connection");
	}
	?>
<?php

define('WEBROOT',dirname(__FILE__));
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
define('ROOT',dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');



	if (!isset($_GET['page']) || $_GET['page'] == "")
	{
        echo"aa";
		$page = "accueil";
	}
	else
	{
		if (!file_exists("contenu/" . $_GET['page'] . ".php"))
		{
			$page = "404";
		}
		else
        {
            $page=$_GET['page'];
        }
    }
ob_start();
include "contenu/".$page.".php";
$contenu = ob_get_contents();
ob_end_clean();	

//require 'includes/config.php';
require 'layout.php';


?>
=======
<?php

require "/Views/home.php";
>>>>>>> caa67980643649a31ba47f87a48da8c4fdd54a11
