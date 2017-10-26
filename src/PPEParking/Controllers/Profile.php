<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Profile extends Functions
{
    public function start()
    {
        global $db;
        $user = new Authentication();
        if (isset($_POST['submit'])) {
            $user->updateSelfProfile();
        } else {
            if (isset($_GET['error'])) {
                $this->display('loginError', array('user' => $user));
            } elseif (isset($_GET['notauthorize'])) {
                $this->display('notAuthorized', array('user' => $user));
            } else {
                $request_on = $db->query("SELECT * FROM reserve r, slot s WHERE id_u = '".$_SESSION['id']."' AND etat = 0 AND r.id_s = s.id_s");
                $request_slot = $db->query("SELECT * FROM reserve r, slot s WHERE id_u = '".$_SESSION['id']."' AND r.id_s = s.id_s");
                $this->display('profile', array(
                    'user' => $user,
                    'request_on' => $request_on,
                    'request_slot' => $request_slot,
                    ));
            }
        }
    }
}