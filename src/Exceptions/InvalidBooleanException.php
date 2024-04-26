<?php

namespace Jannbar\Brainiac\Exceptions;

class InvalidBooleanException extends \Exception
{
    public static function make($value)
    {
        $type = gettype($value);

        return new static("Expected a boolean, received `{$type}`.");
    }
}
