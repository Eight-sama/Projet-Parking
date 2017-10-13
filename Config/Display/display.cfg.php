<?php

use Config\Main\MainCfg;
use Config\Config\ConfigCfg;
use Config\Controller;
use Config\Autoloader\AutoloaderCfg;

//Initialiasing configuration variables
$cfg = new ConfigCfg;
$cfg->initialise();

//Recuperation of the controller
$page = new Controller;
$pageDisp = $page->getPage();

//Autoloading classes
$autoload = new AutoloaderCfg;
$autoload->__autoload('initController');

//Initialising controller
/*$controller = $page->initController($pageDisp);*/

//Recuperation and display of the page with ob_start
$init = new MainCfg;
$init->display($pageDisp);

?>
