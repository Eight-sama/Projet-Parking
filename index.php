<?php

session_start();

define('WEBROOT', dirname(__FILE__));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');

require "Core/Autoloader.class.php";

Autoloader::register();

use Core\Controller;
use Core\Functions;
use Core\Loop;

//Initialize objects
$controller = new Controller;
$functions = new Functions;
$loop = new Loop;

//Launch Controller
$init->display($pageDisp);
