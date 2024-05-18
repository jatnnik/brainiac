<?php

namespace Jannbar\Brainiac\Exceptions;

class ShortArrayException extends \Exception
{
    public static function make($value, $expected)
    {
        $actual_length = count($value);
        $term = $expected === 1 ? 'item' : 'items';

        return new static(
            "Array has too few items. Expected at least {$expected} {$term}, {$actual_length} given."
        );
    }
}
