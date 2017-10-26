<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ModifyUser extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('modifyUser', array('user' => $user));
    }
}
