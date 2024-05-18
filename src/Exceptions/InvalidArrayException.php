<?php

namespace Jannbar\Brainiac\Exceptions;

class InvalidArrayException extends \Exception
{
    public static function make($value)
    {
        $type = gettype($value);

        return new static("Expected an array, received `{$type}`.");
    }
}
