<?php
namespace Config\Main;
    
class MainCfg{
    
    public function define_webroot(){
        define('WEBROOT', dirname(__FILE__));
    }
    public function define_base_url(){
        define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
    }
    public function define_root(){
        define('ROOT', dirname(WEBROOT));
    }
    public function define_ds(){
        define('DS', DIRECTORY_SEPARATOR);
    }
    public function define_core(){
        define('CORE',ROOT.DS.'core');
    }
    public function display($page){
        ob_start();
        require "Controllers/".$page.".php";
        $content = ob_get_contents();
        ob_end_clean();
        require "Views/layout/main_layout.php";
    }
    
}