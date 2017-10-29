<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class RegisterSlotApplications extends Functions
{

    public function start()
    {
        global $db;
        $user = new Authentication();
        if (isset($_GET['accept'])) {
            $request = $db->query("UPDATE user SET lvl = 1 WHERE id_u = '".$_GET['id']."'");
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['refused'])){
            $request = $db->query("DELETE * FROM user WHERE id_u = '".$_GET['id']."'");
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['acceptSlot'])){
            $request = $db->query("UPDATE reserve SET etat = 1 WHERE id_u = '".$_GET['id']."' AND id_s = '".$_GET['id_slot']."' AND id_r IN ('".$_GET['id_r']."')");
            $request = $db->query("DELETE FROM reserve WHERE id_u = '".$_GET['id']."' AND etat = 0");
            $request = $db->query("UPDATE slot SET state_s = 1 WHERE id_s = '".$_GET['id_slot']."'");
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['refuseSlot'])){
            $request = $db->query("UPDATE reserve SET etat = 2 WHERE id_u = '".$_GET['id']."' AND id_s = '".$_GET['id_slot']."'");
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        }
        else{
            $request_on = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 0 AND u.id_u = r.id_u AND s.id_s = r.id_s");
            $request_accepted = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 1 AND u.id_u = r.id_u AND s.id_s = r.id_s");
            $request_denied = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 2 AND u.id_u = r.id_u AND s.id_s = r.id_s");
            $request = $db->query("SELECT * FROM user WHERE lvl = 0");
            $this->display('registerSlotApplications', array(
                'user' => $user,
                'request' => $request,
                'request_on' => $request_on,
                'request_accepted' => $request_accepted,
                'request_denied' => $request_denied
                ));
        }
    }
}
