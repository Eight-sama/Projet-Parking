<?php

session_start();

define('WEBROOT', dirname(__FILE__));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');

require "Core/autoload.core.php";
require "Core/functions.core.php";
require "Core/loop.core.php";
use Core\Autoload;
$autoload = new Autoload;
$autoload->__autoload('MainCfg');
$autoload->__autoload('ConfigCfg');
$autoload->__autoload('ControllerCfg');
$autoload->__autoload('Loop');

//Recuperation and display of the page with ob_start
$init = new MainCfg;
$init->display($pageDisp);
?>
