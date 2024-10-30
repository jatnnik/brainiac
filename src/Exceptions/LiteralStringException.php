<?php

namespace Jatnnik\Brainiac\Exceptions;

final class LiteralStringException extends \Exception
{
    public static function make(string $value, string $expected): self
    {
        return new self(
            "Expected string to be '{$expected}', but received '{$value}'."
        );
    }
}
