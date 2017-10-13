<?php
namespace Core;

class Controller
{
	/*
    *@getPage()
    *Retrieve and require the controller while also returning
    *the page name to display it
    *
    */
    public function getPage()
	{
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $page = 'home';
            return $page;
        }
        else
        {
            if(!file_exists("Controllers/".$_GET['page'].".controller.php"))
            {
                $page = 'not_found';
                return $page;
            }
            else
            {
                $page = $_GET['page'];
                require "Controllers/".$_GET['page'].".controller.php";
                return $page;
            }
        }
    }

    /*
    *@initController(str)
    *Initialise the controller with the old name
    *
    */
    public function initController($controller)
	{
        $controllername = str_replace("_", "", ucwords((ucfirst($controller."Controller")), '_'));
        $controller = new $controllername;
        return $controller;
    }

	/*
    *@display(str)
   	*Display the page while using ob_start
    *
    */
	public function display($page)
	{
        ob_start();
        require "Views/content/".$page.".view.php";
        $content = ob_get_contents();
        ob_end_clean();
        require "Views/layout/main_layout.php";
    }
}
