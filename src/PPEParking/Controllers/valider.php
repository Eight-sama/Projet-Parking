<?php
$id = (int)$_GET['id'];
   
require "../Model/gerer_demande_park.php";

valider_reserv($id) ; 

//header('location:index?page=gerer_demande_park');

