<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ParkingScheme extends Functions
{

    public function start()
    {
        global $db;
        $user = new Authentication();
        $request_c = $db->query("SELECT * FROM slot WHERE type_s = 'C'");
        $request_b = $db->query("SELECT * FROM slot WHERE type_s = 'B'");
        $request_a = $db->query("SELECT * FROM slot WHERE type_s = 'A'");
        $this->display('parkingScheme', array(
            'user' => $user,
            'request_a' => $request_a,
            'request_b' => $request_b,
            'request_c' => $request_c)
        );
    }
}
