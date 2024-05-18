<?php

namespace Jannbar\Brainiac\Exceptions;

class LongArrayException extends \Exception
{
    public static function make($value, $expected)
    {
        $actual_length = count($value);
        $term = $expected === 1 ? 'item' : 'items';

        return new static(
            "Array has too many items. Expected at most {$expected} {$term}, {$actual_length} given."
        );
    }
}
