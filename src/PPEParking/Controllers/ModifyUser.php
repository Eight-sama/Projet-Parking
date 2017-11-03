<?php
namespace PPEParking\Controllers;

use App\Functions;
use PPEParking\Models\Authentication;

class ModifyUser extends Functions{

    public function start(){
        $user = new Authentication();
        $request = $user->getUserInfoFromId();
        if(isset($_POST['submit'])){
            $user->updateOtherProfile();
            header('Location: '.BASE_URL.'/index.php?page=modifyUser&id='.$_GET['id']);
        }else{
            $button = $this->submit('btn btn-primary ', 'Mettre à jour', 'submit');
            $this->display('modifyUser', array('user' => $user,'request' => $request, 'button' => $button));
        }
    }
}
