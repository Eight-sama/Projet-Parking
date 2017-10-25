<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class RegisterSlotApplications extends Functions{

    public function start(){
        global $db;
        $user = new Authentication();
        $request = $db->query("SELECT * FROM user WHERE lvl = 0");
        $this->display('registerSlotApplications', array('user' => $user, 'request' => $request));
    }
}
