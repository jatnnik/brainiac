<?php

namespace Jannbar\Brainiac\Exceptions;

class InvalidStringException extends \Exception
{
    public static function make($value)
    {
        $type = gettype($value);

        return new static("Expected a string, received `{$type}`.");
    }
}
