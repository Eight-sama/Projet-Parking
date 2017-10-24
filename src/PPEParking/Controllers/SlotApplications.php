<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class SlotApplications extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('slotApplications', array('user' => $user));
    }
}
