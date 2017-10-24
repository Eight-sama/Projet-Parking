<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Home extends Functions{

    public function start(){
        $user = new Authentication();
        if($user->isConnected()){
            header('Location: '.BASE_URL.'/index.php?page=profile');
        }else{
        $this->display('home', array('user' => $user));
        }
    }
}
