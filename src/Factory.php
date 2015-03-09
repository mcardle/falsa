<?php

namespace Mcardle\Falsa;

class Factory{
	
    const DEFAULT_LOCALE = 'en_US';

    static private $availableLocales = [];

    static public function create($type, $locale = self::DEFAULT_LOCALE){

    	self::setAvailableLocales();

    	if(!self::checkLocale($locale)){
    		die('Locale unknown');
    	}

        if($type === 'chain'){
            $class = '\Mcardle\Falsa\Chainer';
        }
        else{
            $class = '\Mcardle\Falsa\\'.$type;
        }

    	
    	if(class_exists($class, true)){
    		$instance = new $class($locale);
            return $instance->generate();
    	}
    	else{
    		die('Unknown method '.$type);
    	}
    }

    static private function checkLocale($locale){
    	return in_array($locale, self::$availableLocales);
    }

    static private function setAvailableLocales(){

    	foreach(glob(__DIR__.'/Providers/*') as $folder){
    		if(is_dir($folder)){
    			$folderChunks = explode('/', $folder);
    			self::$availableLocales[] = end($folderChunks);
    		}
    	}
    }
}