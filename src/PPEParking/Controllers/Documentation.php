<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Documentation extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('documentation', array('user' => $user));
    }
}
