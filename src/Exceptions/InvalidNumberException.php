<?php

namespace Jannbar\Brainiac\Exceptions;

class InvalidNumberException extends \Exception
{
    public static function make($value)
    {
        $type = gettype($value);

        return new static("Expected a number, received `{$type}`.");
    }
}
