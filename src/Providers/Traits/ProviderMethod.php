<?php

namespace Mcardle\Falsa\Providers\Traits;

trait ProviderMethod{

	public $settings, $key, $build, $locale;
	
	public function __construct($settings = [], $locale = 'en_US', $build = []){
		$this->settings = $settings;
		$this->build = $build;
		$this->locale = $locale;
		$this->key = $this->parseKeyName();
	}

	private function parseKeyName(){
		$classChunks = explode('\\', get_class($this));
		$key = strtolower(end($classChunks));
		return $key;
	}
}