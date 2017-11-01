<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ManageSlots extends Functions
{

    public function start()
    {
        $user = new Authentication();
        $request = $user->getAllSlotsInfos();
        $this->display('manageSlots', array(
            'user' => $user,
            'request' => $request,
        ));
    }
}
