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
}
