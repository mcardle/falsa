<?php

namespace Mcardle\Falsa\Providers\Interfaces;

interface ProviderMethodInterface{
	
	public function __construct($settings = []);
	public function init($locale = '');
	public function generate();

}