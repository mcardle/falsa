<?php

namespace Keystroke\Falsa\Entities;

/**
 * Class Entity
 * @package Keystroke\Falsa\Entities
 */
abstract class Entity{

    /**
     * @var string
     */
    protected $locale = 'en_us';

    /**
     * @var string
     */
    protected $driver = 'class';

    /**
     * Returns what the class was intended for. Fx.: the Category class returns a string representing a category
     * @return mixed
     */
    abstract public function generate();

    /**
     * @param $locale
     */
    public function setLocale($locale){
        $this->locale = $locale;
    }

    /**
     * Available drivers: class (default), mysql, redis
     * @param $driver
     */
    public function setDriver($driver){
       $this->driver = $driver;
    }
}