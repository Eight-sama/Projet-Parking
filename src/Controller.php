<?php
namespace Core;

class Controller
{

    public function __construct()
    {
        $f = new Functions();
    }
	/*
    *@getPage()
    *Retrieve and require the controller
    */
    public function launch()
	{
	    $url = $f->eUrlToClass($_GET['page']);
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $page = 'home';
            return $page;
        }
        else
        {
            if(!file_exists("app/Controllers/".$_GET['page'].".controller.php"))
            {
                $page = 'not_found';
                return $page;
            }
            else
            {
                $page = $_GET['page'];
                require "app/Controllers/".$_GET['page'].".controller.php";
            }
        }
    }
	/*
    *@display(str)
   	*Display the page while using ob_start
    */
	public function display($page)
	{
        ob_start();
        require "app/Views/content/".$page.".view.php";
        $content = ob_get_contents();
        ob_end_clean();
        require "app/Views/layout/main_layout.php";
    }
}
