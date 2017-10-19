<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentification;

class Home extends Functions{

    public function homeSpace(){
    	$this->display('home');
    }
}
