<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ConfirmSlotApp extends Functions
{

    public function start()
    {
        global $db;
        $user = new Authentication();
        if (isset($_GET['id_slot']) && isset($_SESSION)) {
            $state = 0;
            $request = $db->prepare("INSERT INTO reserve(id_s,id_u,date_r_deb,etat,date_r_fin) VALUES (?,?,?,?,?)");
            $request->execute([$_GET['id_slot'],$_SESSION['id'],date('Y-m-d'),$state,date('Y-m-d')]);
            $user->sql_check_error($request);
            $this->display('confirmSlotApp', array('user' => $user));
        } else {
            $this->display('notFound', array('user' => $user));
        }
    }
}
