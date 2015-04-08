<?php

namespace Falsa;
use Falsa\Providers\Interfaces\ProviderMethodInterface;

class Product implements ProviderMethodInterface{

	use \Falsa\Providers\Traits\ProviderMethod;

	protected $products = [];

	public function init($locale = ''){
		$this->products = require(__DIR__.'/Providers/'.$locale.'/products.php');
	}

	public function generate($args = []){
		$this->args = $args;
		$index = !empty($args[0]) ? strtolower($args[0]) : '';

		if(empty($index)){
			if(!empty($this->build['brand'][$this->build['current_run']])){
				$index = strtolower($this->build['brand'][$this->build['current_run']]);
			}
			else{
				$keys = array_keys($this->products);
				for($i=0; $i<10; $i++){
					shuffle($keys);
				}
				$index = $keys[0];
			}
		}

		//echo '<pre>'.print_r($this->build['category'], true); die();
		$values = $this->products[$index];

		for($i=0; $i<10; $i++){
			shuffle($values);
		}

		$product = ucwords($values[0]);
		return $product;
	}

}