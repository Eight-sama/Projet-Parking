<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ManageSlots extends Functions
{

    public function start()
    {
        global $db;
        $user = new Authentication();
        $request = $db->query("SELECT * FROM slot");
        $this->display('manageSlots', array(
            'user' => $user,
            'request' => $request,
        ));
    }
}
