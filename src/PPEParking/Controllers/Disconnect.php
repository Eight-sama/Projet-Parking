<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Disconnect extends Functions{

    public function start(){
        $user = new Authentication();
        if($_SESSION['connected']){
            session_destroy();
            header('Location: '.BASE_URL.'/index.php');
        }else{
            header('Location: '.BASE_URL.'/index.php');
        }
    }
}
