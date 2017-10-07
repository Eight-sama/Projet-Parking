<?php
namespace Config;

class Controller{
    
    public function getPage(){
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $page = 'home';
            return $page;
        }
        else
        {
            if(!file_exists("Controllers/".$_GET['page'].".php"))
            {
                $page = 'not_found';
                return $page;
            }
            else
            {
                $page = $_GET['page'];
                return $page;
            }
        }
    }
}

?>