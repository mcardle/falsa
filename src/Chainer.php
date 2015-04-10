<?php

namespace Falsa;

class Chainer{

	private $build = [];
	
	public function __construct($locale = 'en_US'){
		$this->locale = $locale;
		$this->build['runs'] = 1;
	}

	public function __call($name, $args){

		for($i=0; $i<$this->build['runs']; $i++){
			$this->build['current_run'] = $i;
			$class = '\Falsa\\'.$name;

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

	public function debug($die = false, $clean = true){
		if($clean){
			$this->clean();
		}
		echo '<pre>'.print_r($this->build, true).'</pre>';
		if($die){
			die();
		}
	}

	private function clean(){
		if(
			!empty($this->build['category']) && 
			!empty($this->build['brand']) && 
			count($this->build['category']) === count($this->build['brand'])
		){
			for($i=0; $i<count($this->build['category']); $i++){
				$this->build['brand'][$i] = str_replace(' '.$this->build['category'][$i], '', $this->build['brand'][$i]);
			}
		}
	}

	public function execute($clean = true){
		// Strips current run
		unset($this->build['current_run']);

		if($clean){
			$this->clean();
		}
		return $this->build;
	}
}
