<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentification;

class Home extends Functions{
    private $mod;

    public function __construct()
    {
        $this->mod = new Authentification();
    }
    /**
     * @return mixed
     */
    public function getMod()
    {
        return $this->mod;
    }

    public function start(){
        $this->display('home');
    }

}
