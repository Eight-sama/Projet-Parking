<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ParkingScheme extends Functions{

    public function start(){
        $user = new Authentication();
        $this->display('parkingScheme', array('user' => $user));
    }
}
