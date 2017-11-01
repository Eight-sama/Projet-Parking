<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ManageUser extends Functions{

    public function start(){
        $user = new Authentication();
        $request = $user->getAllUsersInfos();
        $this->display('manageUser', array('user' => $user, 'request' => $request));
    }
}
