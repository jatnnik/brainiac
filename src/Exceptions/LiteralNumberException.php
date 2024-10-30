<?php

namespace Jatnnik\Brainiac\Exceptions;

final class LiteralNumberException extends \Exception
{
    public static function make(int|float $value, int|float $expected): self
    {
        return new self(
            "Expected number to be {$expected}, but received {$value}."
        );
    }
}
