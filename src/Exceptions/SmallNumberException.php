<?php

namespace Jannbar\Brainiac\Exceptions;

class SmallNumberException extends \Exception
{
    public static function make($value, $expected)
    {
        return new static(
            "Number is too small. Expected a number greater than {$expected}, received {$value}."
        );
    }
}
