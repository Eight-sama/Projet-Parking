<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class Login extends Functions
{

    public function start()
    {
        $user = new Authentication();
        if($user->isConnected()){
            header('Location: '.BASE_URL.'/index.php?page=profile');
        }else{
            if (isset($_POST['submit'])) {
                if($user->login()){
                    header('Location: '.BASE_URL.'/index.php?page=profile');
                }
                else{
                    session_destroy();
                    $this->display('notAuthorized', array('user' => $user));
                }
            } else {
                $form = $this->input('text', 'email', 'Email');
                $form .= $this->input('password', 'password', 'Password');
                $form .= $this->submit('btn btn-default', 'Se connecter', 'submit');
                $this->display('login', array('user' => $user, 'form' => $form));
            }
        }
    }
}
