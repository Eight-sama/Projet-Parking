<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class BanUser extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('banUser', array('user' => $user));
    }
}
