<?php

use Config\Main\MainCfg;
use Config\ConfigCfg;
use Config\Controller;

$cfg = new ConfigCfg;
$cfg->initialise();

$page = new Controller;
$page = $page->getPage();

$init = new MainCfg;
$init->display($page);

?>