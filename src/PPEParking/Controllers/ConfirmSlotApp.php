<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ConfirmSlotApp extends Functions{

    public function start(){
        $user = new Authentication();
        if($user->isConnected() && $user->onQueue()){
            $this->display('queueSlotApp', array('user' => $user));
        } else{
            $this->display('confirmSlotApp', array('user' => $user));
        }
    }
}
