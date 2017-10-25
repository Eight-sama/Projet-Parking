<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class RegisterApplications extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('registerApplications', array('user' => $user));
    }
}
