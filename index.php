<?php

session_start();

define('WEBROOT', dirname(__FILE__));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');

require "Core/autoload.core.php";
use Core\AutoloadCore;
$autoload = new AutoloadCore;
$autoload->__autoload('AutoloadCore');
$autoload->__autoload('ControllerCore');
$autoload->__autoload('FunctionsCore');
$autoload->__autoload('LoopCore');

use Core\ControllerCore;
use Core\FunctionsCore;
use Core\LoopCore;

//Initialize objects
$controller = new ControllerCore;
$functions = new FunctionsCore;
$loop = new LoopCore;

//Launch Controller
$init->display($pageDisp);
