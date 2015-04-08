<?php

namespace Falsa;
use Falsa\Providers\Interfaces\ProviderMethodInterface;

class Brand implements ProviderMethodInterface{

	use \Falsa\Providers\Traits\ProviderMethod;

	protected $brands = [];

	public function init($locale = ''){
		$this->brands = require(__DIR__.'/Providers/'.$locale.'/brands.php');
	}

	public function generate($args = []){
		$this->args = $args;
		$index = !empty($args[0]) ? strtolower($args[0]) : '';

		if(empty($index)){
			if(!empty($this->build['category'][$this->build['current_run']])){
				$index = strtolower($this->build['category'][$this->build['current_run']]);
			}
			else{
				$keys = array_keys($this->brands);
				for($i=0; $i<10; $i++){
					shuffle($keys);
				}
				$index = $keys[0];
			}
		}

		$values = $this->brands[$index];

		for($i=0; $i<10; $i++){
			shuffle($values);
		}

		$brand = ucwords($values[0]);
		return $brand;
	}

}