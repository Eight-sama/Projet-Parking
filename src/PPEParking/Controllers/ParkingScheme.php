<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ParkingScheme extends Functions
{

    public function start()
    {
        $user = new Authentication();
        $request_a = $user->getSlotType('A');
        $request_b = $user->getSlotType('B');
        $request_c = $user->getSlotType('C');
        $this->display('parkingScheme', array(
            'user' => $user,
            'request_a' => $request_a,
            'request_b' => $request_b,
            'request_c' => $request_c)
        );
    }
}
