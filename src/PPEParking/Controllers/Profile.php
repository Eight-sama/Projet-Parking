<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Profile extends Functions
{
    public function start()
    {
        $user = new Authentication();
        if (isset($_POST['submit'])) {
            $user->updateSelfProfile();
        } else {
            $this->display('profile', array('user' => $user));
        }
    }
}