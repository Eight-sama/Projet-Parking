<?php

require "Config/config.cfg.php";
require "Core/functions.core.php";

if(!isset($_GET['p']) || $_GET['p'] == "")
{
  $page = 'home.controller';
}
else
{
  if(!file_exists("Controllers/".$_GET['p'].".php"))
  {
      $page = 'not_found';
  }
  else
  {
    $page = $_GET['p'];
  }
}   

$init->display($page);

?>
