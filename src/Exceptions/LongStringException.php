<?php

namespace Jannbar\Brainiac\Exceptions;

final class LongStringException extends \Exception
{
    public static function make(string $value, int $expected): self
    {
        $actual_length = strlen($value);
        $term = $expected === 1 ? 'character' : 'characters';

        return new self(
            "String is too long. Expected a string with at most {$expected} {$term}, {$actual_length} given."
        );
    }
}
