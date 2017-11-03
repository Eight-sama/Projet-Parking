<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ModifySlot extends Functions{

    public function start(){
        $user = new Authentication();
        $request = $user->getSlotInfoFromId();
        $this->display('modifySlot', array('user' => $user,'request' => $request));
    }
}