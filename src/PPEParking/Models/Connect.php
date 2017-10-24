<?php
namespace PPEParking\Models;

class Connect{

    public function connectDb(){
        try
        {
            $db = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
        }
        catch(Exception $e)
        {
             die("Error: Couldn't connect to the database.");
        }
    }

}
