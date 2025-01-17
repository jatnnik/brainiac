<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class NegativeNumberException extends \Exception
{
    public static function make(): self
    {
        return new self(
            'Number is positive. Expected a negative number (< 0).'
        );
    }
}
