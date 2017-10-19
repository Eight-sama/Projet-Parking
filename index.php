<?php
session_start();

define('WEBROOT', dirname(__FILE__));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');

require "vendor/autoload.php";

use App\Launcher;

//Initialize & launch app
$launcher = new Launcher();
$launcher->start();