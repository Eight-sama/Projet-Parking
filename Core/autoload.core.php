<?php
namespace Core;

class Autoload{
	public function __autoload($class_name){
        //Class directories
        $directories = array(
			// Core files
			'Core/',
            // Controllers files
            'Controllers/',
            // Models files
            'Models/Connect/',
            'Models/Home/'
        );

        //For each directory
        foreach($directories as $directory){
            $this->requireClass('cfg', $class_name, $directory);
			$this->requireClass('core', $class_name, $directory);
            $this->requireClass('controller', $class_name, $directory);
            $this->requireClass('model', $class_name, $directory);
        }
    }

    public function requireClass($type, $class_name, $directory){
        //See if the controller class file exists
        if(file_exists($directory.$class_name.'.'.$type.'.php')){
            require_once($directory.$class_name.'.'.$type.'.php');
        }
    }
}
