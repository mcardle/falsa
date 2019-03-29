<?php

namespace Keystroke\Falsa;

use Illuminate\Support\Str;
use Keystroke\Falsa\Exceptions\EntityNotFoundException;

abstract class Builder{
    /**
     * @var array
     */
    protected $properties;

    /**
     * @param $name
     * @param $arguments
     * @return Builder
     * @throws EntityNotFoundException
     */
    public function __call($name, $arguments){
        $class = '\Keystroke\Falsa\Entities\\'.Str::studly($name);

        if(!class_exists($class)){
            throw new EntityNotFoundException('Entity '.$name.' does not exist!');
        }

        $instance = new $class(...$arguments);
        $instance->setLocale($this->properties['locale']);
        $instance->setDriver($this->properties['driver']);

        $this->properties[$name] = $instance->generate();

        return $this;
    }

    /**
     * @return array
     */
    public function execute(){
        return $this->properties;
    }
}