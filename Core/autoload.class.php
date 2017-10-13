<?php
namespace Core;

class AutoloadCore{
	public function __autoload($class_name){
        //Class directories
        $directories = array(
			// Core folders
			'Core/',
            // Controllers folders
            'Controllers/',
            // Models folders
            'Models/Connect/',
            'Models/Home/'
        );

        //For each directory
        foreach($directories as $directory){
            $this->requireClass('class', $class_name, $directory);
        }
    }

    public function requireClass($type, $class_name, $directory){
        //See if the controller class file exists
        if(file_exists($directory.$class_name.'.'.$type.'.php')){
            require_once($directory.$class_name.'.'.$type.'.php');
        }
    }
}
