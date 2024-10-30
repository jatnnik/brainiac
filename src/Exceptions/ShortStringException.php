<?php

namespace Jatnnik\Brainiac\Exceptions;

final class ShortStringException extends \Exception
{
    public static function make(string $value, int $expected): self
    {
        $actual_length = strlen($value);
        $term = $expected === 1 ? 'character' : 'characters';

        return new self(
            "String is too short. Expected a string with at least {$expected} {$term}, {$actual_length} given."
        );
    }
}
