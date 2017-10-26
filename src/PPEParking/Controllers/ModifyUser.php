<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ModifyUser extends Functions{

    public function start(){
        global $db;
        $user = new Authentication();
        $form = $this->input('text', 'email', 'Email');
        $form .= $this->input('text', 'email', 'Surname');
        $form .= $this->input('text', 'email', 'Name');
        $form .= $this->submit('btn btn-primary', 'Mettre à jour', 'submit');
        $request = $db->query("SELECT * FROM user WHERE id_u =".$_GET['id']);
        $this->display('modifyUser', array('user' => $user,'request' => $request, 'form' => $form));
    }
}
