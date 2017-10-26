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
            if (isset($_GET['error'])) {
                $this->display('loginError', array('user' => $user));
            } elseif (isset($_GET['notauthorize'])) {
                $this->display('notAuthorized', array('user' => $user));
            } else {
                $this->display('profile', array('user' => $user));
            }
        }
    }
}