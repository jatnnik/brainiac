<?php

namespace Jannbar\Brainiac\Exceptions;

class LongStringException extends \Exception
{
    public static function make($value, $expected)
    {
        $actual_length = strlen($value);
        $term = $expected === 1 ? 'character' : 'characters';

        return new static(
            "String is too long. Expected a string with at most {$expected} {$term}, {$actual_length} given."
        );
    }
}
