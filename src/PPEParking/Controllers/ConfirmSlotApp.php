<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ConfirmSlotApp extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('confirmSlotApp', array('user' => $user));
    }
}
