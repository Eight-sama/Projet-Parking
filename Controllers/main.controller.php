<?php
namespace Controllers;

class Main{
   /*
    *@getPage()
    *Retrieve and require the controller while also returning
    *the page name to display it
    *
    */
    public function getPage(){
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $page = 'home';
            return $page;
        }
        else
        {
            if(!file_exists("Controllers/".$_GET['page'].".controller.php"))
            {
                $page = 'not_found';
                return $page;
            }
            else
            {
                $page = $_GET['page'];
                require "Controllers/".$_GET['page'].".controller.php";
                return $page;
            }
        }
    }

    /*
    *@initController(str)
    *Initialise the controller with the old name
    *
    */
    public function initController($controller){
        $controllername = str_replace("_", "", ucwords((ucfirst($controller."Controller")), '_'));
        $controller = new $controllername;
        return $controller;
    }
}
?>
