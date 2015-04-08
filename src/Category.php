<?php

namespace Falsa;
use Falsa\Providers\Interfaces\ProviderMethodInterface;

class Category implements ProviderMethodInterface{

	use \Falsa\Providers\Traits\ProviderMethod;

	protected $categories = [];

	public function init($locale = ''){
		$this->categories = require(__DIR__.'/Providers/'.$locale.'/categories.php');
	}

	public function generate($args = []){
		$this->args = $args;
		$index = !empty($args[0]) ? strtolower($args[0]) : '';

		// Category specified and present
		if(!empty($index) && in_array($index, $this->categories)){
			foreach($this->categories as $tmpKey => $tmpValue){
				if($tmpValue == $index){
					$key = $tmpKey;
				}
			}
		}

		// Category specified and not present
		elseif(!empty($index) && !in_array($index, $this->categories)){
			die('Category: '.$index.' not found!');
		}

		// No categories in the locale folder 
		// - Check src/Providers/$locale/categories.php
		elseif(count($this->categories) == 0){
			die('No categories found!');
		}

		// No category specified, create random
		else{
			$key = mt_rand(0, count($this->categories)-1);
		}

		// Returns the selected category to the chainer.
		$category = ucwords($this->categories[$key]);
		return $category;
	}

}