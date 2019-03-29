<?php

namespace Keystroke\Falsa\Exceptions;

use Throwable;

/**
 * Class ClassNotFoundException
 * @package Keystroke\Falsa\Exceptions
 */
class EntityNotFoundException extends \Exception{

    /**
     * ClassNotFoundException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }
}