<?php

namespace Core;

/**
 * Class Autoloader
 *
 * sers à télécharger automatiquemeent les classes
 *
 */


class autoloader{
    
    /*
    * register() permet de générer la classe demander
    *
    */
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    private static function autoload($className){

    	if (strpos($className, __NAMESPACE__.'\\')===0) {
    		
    		$className = str_replace(__NAMESPACE__, '', $className);

    		$className = str_replace('\\','/', $className);

    		require __DIR__.'\\'.$className.'.php';

    	}
    } 

    
}

?>
