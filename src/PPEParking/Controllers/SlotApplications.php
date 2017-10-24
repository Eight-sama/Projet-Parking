<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class SlotApplications extends Functions
{

    public function start()
    {
        $user = new Authentication();
        if (isset($_SESSION) && $user->isAdmin($_SESSION['lvl'])) {
            $this->display('slotApplicationsAdmin', array('user' => $user));
        }
        else{
            $this->display('slotApplications', array('user' => $user));
        }
    }
}
