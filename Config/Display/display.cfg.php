<?php
use Config\Autoloader\AutoloaderCfg;
$autoload = new AutoloaderCfg;
$autoload->__autoload('MainCfg');
$autoload->__autoload('ConfigCfg');
$autoload->__autoload('ControllerCfg');
$autoload->__autoload('Loop');

use Config\Main\MainCfg;
use Config\Config\ConfigCfg;
use Config\ControllerCfg;
use Core\Loop;

//Initialiasing configuration variables
$cfg = new ConfigCfg;
$cfg->initialise();

//Recuperation of the controller
$page = new ControllerCfg;
$pageDisp = $page->getPage();

//Initialising controller
/*$controller = $page->initController($pageDisp);*/
$loop = new Loop;

//Recuperation and display of the page with ob_start
$init = new MainCfg;
$init->display($pageDisp);

?>
