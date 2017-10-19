<?php
namespace PPEParking\Controllers;

use App\Functions;

class Home extends Functions{

    public function start(){
        $this->display('home');
    }
    public function verifController(){
        $l = Launcher();
        $l->controllerInit();
    }
}
