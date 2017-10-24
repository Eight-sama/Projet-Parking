<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ApplyRegisterApp extends Functions{

    public function start(){
        $user = new Authentication();
        if($user->isConnected()){
            header('Location: '.BASE_URL.'/index.php?page=profile');
        }else{
            $this->display('applyRegisterApp', array('user' => $user));
        }
    }
}
