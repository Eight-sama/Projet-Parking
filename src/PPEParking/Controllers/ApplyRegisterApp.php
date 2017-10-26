<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ApplyRegisterApp extends Functions
{

    public function start()
    {
        $user = new Authentication();
        if ($user->isConnected()) {
            header('Location: ' . BASE_URL . '/index.php?page=profile');
        } else {
            if (isset($_GET['registered']) && $_GET['registered'] == 'yes') {
                $this->display('confirmApplyRegApp', array('user' => $user));
            } else {
                if (isset($_POST['submit'])) {
                    $user->applyRegister();
                } else {
                    $form = $this->input('text', 'email', 'Email');
                    $form .= $this->input('text', 'surname', 'Nom');
                    $form .= $this->input('text', 'name', 'Prénom');
                    $form .= $this->input('password', 'password', 'Mot de passe');
                    $form .= $this->submit('btn btn-success', 'S\'inscrire', 'submit');
                    $this->display('applyRegisterApp', array('user' => $user, 'form' => $form));
                }
            }
        }
    }
}
