<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class PositiveNumberException extends \Exception
{
    public static function make(): self
    {
        return new self(
            'Number is negative. Expected a positive number (> 0).'
        );
    }
}
