<?php

namespace Jannbar\Brainiac\Exceptions;

final class SmallNumberException extends \Exception
{
    public static function make(float|int $value, float|int $expected): self
    {
        return new self(
            "Number is too small. Expected a number greater than {$expected}, received {$value}."
        );
    }
}
