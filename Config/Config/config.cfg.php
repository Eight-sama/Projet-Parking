<?php
namespace Config;

require "Config/Main/main.cfg.php";

use Config\Main\MainCfg;

class ConfigCfg{
    
    public function initialise(){     
        session_start();
        $init = new MainCfg;
        $init->define_webroot();
        $init->define_base_url();
        $init->define_root();
        $init->define_ds();
        $init->define_core();
    }
    
}    
?>