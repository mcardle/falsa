<?php

namespace Mcardle\Falsa;

class Chainer{

	private $build = [];
	
	public function __construct($locale = 'en_US'){
		$this->locale = $locale;
		$this->build['runs'] = 1;
	}

	public function __call($name, $args){

		for($i=0; $i<$this->build['runs']; $i++){
			$this->build['current_run'] = $i;
			$class = '\Mcardle\Falsa\\'.$name;

			if(class_exists($class, true)){
				$provider = new $class($args, $this->locale, $this->build);
				$provider->init($this->locale);
				$this->build[$provider->key][] = $provider->generate($args);
			}
		}

		return $this;
	}

	public function loop($x = 1){
		$x = intval($x);
		if($x >= 1 && $x <= 1000){
			$this->build['runs'] = $x; 
		}
		else{
			die('x cannot be less than 1 or higher than 1000');
		}

		return $this;
	}

	public function exec(){
		echo '<pre>';
		print_r($this->build);
	}
	
}
