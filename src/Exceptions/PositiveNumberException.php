<?php

namespace Jannbar\Brainiac\Exceptions;

final class PositiveNumberException extends \Exception
{
    public static function make(): self
    {
        return new self(
            'Number is negative. Expected a positive number (> 0).'
        );
    }
}
