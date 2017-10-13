<?php
namespace Config\Main;
    
class MainCfg{
    
    public function defineWebroot(){
        define('WEBROOT', dirname(__FILE__));
    }
    public function defineBaseUrl(){
        define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
    }
    public function defineRoot(){
        define('ROOT', dirname(WEBROOT));
    }
    public function defineDs(){
        define('DS', DIRECTORY_SEPARATOR);
    }
    public function defineCore(){
        define('CORE',ROOT.DS.'core');
    }
    public function display($page){
        ob_start();
        require "Views/content/".$page.".view.php";
        $content = ob_get_contents();
        ob_end_clean();
        require "Views/layout/main_layout.php";
    }
    
}
