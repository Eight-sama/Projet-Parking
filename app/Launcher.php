<?php
namespace App;

use PPEParking\Controllers\Home;
use PPEParking\Controllers\Login;
use PPEParking\Controllers\RegisterApplication;
use PPEParking\Controllers\SignUp;

/**
 * Class Launcher
 * @package App
 */
class Launcher
{
    private $page;

    /**
     * Launcher constructor.
     */
    public function __construct(){
        $this->page = "";
    }
    /**
     *@var
     *Retrieve and require the controller
     */
    public function start()
	{
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $this->setPage('home');
            $this->controllerInit($this->getPage());
        }
        else
        {
            if(!file_exists("src/PPEParking/Controllers/".ucfirst($_GET['page']).".php"))
            {
                $this->setPage('notFound');
                $this->controllerInit($this->getPage());
            }
            else
            {
                $this->setPage($_GET['page']);
                $this->controllerInit($this->getPage());
            }
        }
    }
    /**
     * @param $page
     */
    public function controllerInit($page){
        if($page == 'home'){
            $homeController = new Home();
            $homeController->start();
        }
        if($page == 'login'){
            $homeController = new Home();
            $homeController->start();
        }
        if($page == 'registerApplication'){
            $homeController = new Home();
            $homeController->start();
        }
        if($page == 'notFound'){
            $homeController = new Home();
            $homeController->start();
        }
    }
    /**
     * @param $page
     */
    public function setPage($page){
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getPage(){
        return $this->page;
    }
}
