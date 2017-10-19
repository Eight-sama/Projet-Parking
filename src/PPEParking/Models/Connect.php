<?php
namespace PPEParking\Models;

class Connect{

    public function connect_bdd(){
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
        }
        catch(Exception $e)
        {
             die("Error: Couldn't connect to the database.");
        }
    }

}
