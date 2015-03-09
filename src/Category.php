<?php

namespace Mcardle\Falsa;
use Mcardle\Falsa\Providers\Interfaces\ProviderMethodInterface;

class Category implements ProviderMethodInterface{

	use \Mcardle\Falsa\Providers\Traits\ProviderMethod;

	protected $categories = [];

	public function init($locale = ''){
		$this->categories = require(__DIR__.'/Providers/'.$locale.'/categories.php');
	}

	public function generate($args = []){
		$this->args = $args;
		$index = !empty($args[0]) ? strtolower($args[0]) : '';

		if(!empty($index) && in_array($index, $this->categories)){
			foreach($this->categories as $tmpKey => $tmpValue){
				if($tmpValue == $index){
					$key = $tmpKey;
				}
			}
		}
		elseif(!empty($index) && !in_array($index, $this->categories)){
			die('Category: '.$index.' not found!');
		}
		else{
			$key = mt_rand(0, count($this->categories)-1);
		}

		$category = ucwords($this->categories[$key]);
		return $category;
	}

}