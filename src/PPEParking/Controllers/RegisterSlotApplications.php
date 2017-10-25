<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class RegisterSlotApplications extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('registerSlotApplications', array('user' => $user));
    }
}
