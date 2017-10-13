<?php

namespace Config\Autoloader;

class AutoloaderCfg{

    public function __autoload($class_name){
        //Class directories
        $directories = array(
            // Config files
            'Config/Autoloader/',
            'Config/Config/',
            'Config/Controller/',
            'Config/Display/',
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
            $this->requireClass('cfg', $directory);
			$this->requireClass('core', $directory);
            $this->requireClass('controller', $directory);
            $this->requireClass('model', $directory);
        }
    }

    public function requireClass($type,$directory){
        //See if the controller class file exists
        if(file_exists($directory.$class_name . '.'.$type.'.php')){
            require_once($directory.$class_name . '.'.$type.'.php');
        }
    }
}

?>
