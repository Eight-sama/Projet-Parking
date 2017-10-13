<?php

require "Model/authentification.php";

if(isset($_POST['submit'])){
    $error = false;
    if(!isset($_POST['email'])){
        $error = true;
    }
    if(!isset($_POST['mdp']) || !preg_match("#^([A-Za-z0-9]{1,})$#",$_POST['mdp'])){
        $error = true;
    }
    
    if($error == false){
    login($_POST['mdp'], $_POST['email']);
        echo $alert ; 
    }
}


require "view/login.php";