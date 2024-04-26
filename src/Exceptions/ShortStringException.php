<?php

namespace Jannbar\Brainiac\Exceptions;

class ShortStringException extends \Exception
{
    public static function make($value, $expected)
    {
        $actual_length = strlen($value);
        $term = $expected === 1 ? 'character' : 'characters';

        return new static(
            "String is too short. Expected a string with at least {$expected} {$term}, {$actual_length} given."
        );
    }
}
