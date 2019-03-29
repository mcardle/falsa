<?php

namespace Keystroke\Falsa\Factories;

use Keystroke\Falsa\Builder;

/**
 * Class Chain
 * @package Keystroke\Falsa\Factories
 */
class Chain extends Builder{

    /**
     * Chain constructor.
     * @param string $locale
     * @param string $driver
     */
	public function __construct($locale = 'en_US', $driver = 'class'){
        $this->properties['locale'] = $locale;
        $this->properties['driver'] = $driver;
    }

    /**
     * @param string $locale
     * @return Chain
     */
    public static function init($locale = 'en_US'){
        return new static($locale);
	}
}