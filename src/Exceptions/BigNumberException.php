<?php

namespace Jannbar\Brainiac\Exceptions;

final class BigNumberException extends \Exception
{
    public static function make(float|int $value, float|int $expected): self
    {
        return new self(
            "Number is too big. Expected a number smaller than {$expected}, received {$value}."
        );
    }
}
