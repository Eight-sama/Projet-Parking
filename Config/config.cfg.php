<?php
namespace Config;

require "Main/main.cfg.php";

use Config\Main\MainCfg;
    
    $init = new MainCfg;

    session_start();

    $init->define_webroot();
    $init->define_base_url();
    $init->define_root();
    $init->define_ds();
    $init->define_core();
    
?>