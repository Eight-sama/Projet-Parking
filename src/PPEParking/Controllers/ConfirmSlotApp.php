<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ConfirmSlotApp extends Functions
{

    public function start()
    {
        $user = new Authentication();
        if (isset($_GET['id_slot']) && isset($_SESSION)) {
            $user->insertConfirmSlotApp();
            $this->display('confirmSlotApp', array('user' => $user));
        } else {
            $this->display('notFound', array('user' => $user));
        }
    }
}
