<?php

namespace Jannbar\Brainiac\Exceptions;

class BigNumberException extends \Exception
{
    public static function make($value, $expected)
    {
        return new static(
            "Number is too big. Expected a number smaller than {$expected}, received {$value}."
        );
    }
}
