<?php

namespace Falsa;
use Falsa\Providers\Interfaces\ProviderMethodInterface;

class Product implements ProviderMethodInterface{

	use \Falsa\Providers\Traits\ProviderMethod;

	protected $products = [];

	public function init($locale = ''){
		$this->products = require(__DIR__.'/Providers/'.$locale.'/products.php');
	}

	public function generate(){

		$category = !empty($this->build['category']) ? strtolower($this->build['category'][$this->build['current_run']]) : '';

		if(!empty($this->build['category']) && array_key_exists($category, $this->products)){
			$values = $this->products[$category];
		}
		elseif(!empty($this->build['category']) && !array_key_exists($category, $this->products)){
			die('The category: '.ucfirst($category).' was not found!');
		}
		else{
			$keys = array_keys($this->products);
			for($i=0; $i<10; $i++){
				shuffle($keys);
			}
			$key = $keys[0];
			$values = $this->products[$key];
		}

		for($i=0; $i<10; $i++){
			shuffle($values);
		}

		return $values[0];
	}

}