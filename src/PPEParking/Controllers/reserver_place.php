<?php
$_SESSION['id_u'] = 5; 
    
require "../Model/reserver_place.php";

if(isset($_POST['submit'])){
    ajout_demandePlace($_SESSION['id_u']);
}

require "../view/reserver_place.php";