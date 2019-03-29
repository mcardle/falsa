<?php

namespace Keystroke\Falsa\Entities;

/**
 * Class Category
 * @package Keystroke\Falsa\Entities
 */
class Category extends Entity{

    /**
     * @var string
     */
    protected $filter;

    /**
     * Category constructor.
     * @param $filter
     */
    public function __construct($filter = ''){
        $this->filter = $filter;
    }

    /**
     * @return string
     */
    public function generate(){
        return 'Some random shite';
    }

}