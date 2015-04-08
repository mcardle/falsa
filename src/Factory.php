<?php

namespace Falsa;

class Factory{
	
    const DEFAULT_LOCALE = 'en_US';

    static private $availableLocales = [];

    static public function create($type, $locale = self::DEFAULT_LOCALE){

    	self::setAvailableLocales();
    	if(!self::checkLocale($locale)){ die('Locale unknown');	}

        $class = ($type === 'chain') ? '\Falsa\Chainer' : '\Falsa\\'.$type;

    	if(class_exists($class, true)){ // Class exists using autoload
    		$instance = ($type === 'chain') ? new $class($locale) : new $class([], $locale);
            if($type !== 'chain'){
                $instance->init($locale);
            }
            return $instance->generate();
    	}
    	else{
    		die('Unknown method '.$type);
    	}
    }

    static private function checkLocale($locale){
    	return in_array($locale, self::$availableLocales);
    }

    static private function validateLocale($locale){
        if(preg_match("/^[a-z]{2}_[A-Z]{2}$/", $locale)){
            return $locale;
        }
        return false;
    }

    static private function setAvailableLocales(){

    	foreach(glob(__DIR__.'/Providers/*') as $folder){
    		if(is_dir($folder)){
    			$folderChunks = explode('/', $folder);
                if($locale = self::validateLocale(end($folderChunks))){
    			     self::$availableLocales[] = $locale;
                }
    		}
    	}
    }
}