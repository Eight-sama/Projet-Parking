<?php
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=blogmvc;charset=utf8","root","");
    }
    catch(Exception $e)
    {
         die("erreur de connexion");
    }