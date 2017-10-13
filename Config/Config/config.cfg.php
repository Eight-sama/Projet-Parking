<?php
namespace Config\Config;

require "Config/Main/main.cfg.php";

use Config\Main\MainCfg;

class ConfigCfg{
    
    public function initialise(){     
        session_start();
        $init = new MainCfg;
        $init->defineWebroot();
        $init->defineBaseUrl();
        $init->defineRoot();
        $init->defineDs();
        $init->defineCore();
    }
}    
?>
