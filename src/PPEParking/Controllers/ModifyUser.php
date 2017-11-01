<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ModifyUser extends Functions{

    public function start(){
        $user = new Authentication();
        $request = $user->getUserInfoFromId();
        $form = $this->input('text', 'email', 'Email');
        $form .= $this->input('text', 'email', 'Surname');
        $form .= $this->input('text', 'email', 'Name');
        $form .= $this->submit('btn btn-primary', 'Mettre à jour', 'submit');
        $this->display('modifyUser', array('user' => $user,'request' => $request, 'form' => $form));
    }
}
