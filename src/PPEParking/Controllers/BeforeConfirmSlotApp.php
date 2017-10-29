<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class BeforeConfirmSlotApp extends Functions
{

    public function start()
    {
        global $db;
        $user = new Authentication();
            if (isset($_GET['id_nb']) && isset($_SESSION)){
                $request_check = $db->query("SELECT id_u FROM reserve Where id_s='".$_GET['id_nb']."'  AND id_u='".$_SESSION['id']."'");
                $request_nb = $db->query("SELECT COUNT(DISTINCT id_u) AS nb FROM reserve WHERE id_s='".$_GET['id_nb']."'");
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