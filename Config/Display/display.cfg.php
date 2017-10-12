<?php

use Config\Main\MainCfg;
use Config\ConfigCfg;
use Config\Controller;

//Initialisation des variables de config
$cfg = new ConfigCfg;
$cfg->initialise();

//Récupération du controller
$page = new Controller;
$pageDisp = $page->getPage();

//Initialisation du controller
$controller = $page->initController($pageDisp);

//Récupération et affichage de la page via ob_start
$init = new MainCfg;
$init->display($pageDisp);

?>