<?php
namespace PPEParking\Controllers;

use App\Functions;

class Disconnect extends Functions{

    public function start(){
        if($_SESSION['connected']){
            session_destroy();
            header('Location: '.BASE_URL.'/index.php');
        }else{
            header('Location: '.BASE_URL.'/index.php');
        }
    }
}
