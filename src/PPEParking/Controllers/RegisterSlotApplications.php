<?php

namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class RegisterSlotApplications extends Functions
{

    public function start()
    {
        $user = new Authentication();
        if (isset($_GET['accept'])) {
            $user->updateUserAccept();
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['refused'])){
            $user->updateUserRefuse();
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['acceptSlot'])){
            $user->updateSlotAccept();
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        } elseif(isset($_GET['refuseSlot'])){
            $user->updateSlotRefuse();
            header('Location: '.BASE_URL.'/index.php?page=registerSlotApplications');
        }
        else{
            $request = $user->getRegisterUserOnModif();
            $request_on = $user->getRequestOnModif();
            $request_accepted = $user->getAcceptedRequest();
            $request_denied = $user->getRefusedRequest();
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
