<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class NotFound extends Functions
{
    public function start(){
        $user = new Authentication();
        $this->display('notFound', array('user' => $user));
    }
}