<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ManageUser extends Functions{

    public function start(){
        global $db;
        $user = new Authentication();
        $request = $db->query("SELECT * FROM user");
        $this->display('manageUser', array('user' => $user, 'request' => $request));
    }
}
