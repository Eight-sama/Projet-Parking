<?php
session_start();
define('WEBROOT', dirname(__FILE__));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');
require "Config/Config/config.cfg.php";
require "Core/functions.core.php";
require "Core/loop.core.php";
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
