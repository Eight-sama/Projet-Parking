<?php
namespace App;

use PPEParking\Controllers\Home;
use PPEParking\Controllers\LoginController;
use PPEParking\Controllers\RegisterApplication;
use PPEParking\Controllers\SignUp;

class Launcher
{
    private $page;

    public function __construct(){
        $this->page = "";
    }
	/*
    *@getPage()
    *Retrieve and require the controller
    */
    public function start()
	{
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $page = 'home';
            $this->controllerInit($page);
        }
        else
        {
            if(!file_exists("app/Controllers/".ucfirst($_GET['page']).".controller.php"))
            {
                $page = 'notFound';
                $this->controllerInit($page);
            }
            else
            {
                $page = $_GET['page'];
                require "app/Controllers/".$_GET['page'].".controller.php";
                $this->controllerInit($page);
            }
        }
    }
    public function controllerInit($page){
        $this->pageCond('home',$page, Home::homeSpace($page));
        $this->pageCond('login',$page, Login::display($page));
        $this->pageCond('registerApplication',$page, RegisterApplication::display($page));
        $this->pageCond('signUp',$page, SignUp::display($page));   
    }
    public function pageCond($page, $page2, $object){
        if($page2 == $page){
            return $object;
        }
        else{
            return NotFound::display($page);
        }
    }
    public function setPage(){

    }
    public function getPage(){
        
    }
}
