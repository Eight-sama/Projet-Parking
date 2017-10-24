<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Home extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('home', array('user' => $user));
    }
}
