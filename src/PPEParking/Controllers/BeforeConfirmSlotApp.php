<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class BeforeConfirmSlotApp extends Functions
{

    public function start()
    {
        $user = new Authentication();
            if (isset($_GET['id_nb']) && isset($_SESSION)){
                $request_check = $user->getRequestCheck();
                $request_nb = $user->getRequestNb();
                $this->display('beforeConfirmSlotApp', array(
                'user' => $user,
                'request_check' => $request_check,
                'request_nb' => $request_nb
                ));
            } else {
                $this->display('notFound', array('user' => $user));
            }
        }
    }