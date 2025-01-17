<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidFloatException extends \Exception
{
    public static function make(): self
    {
        return new self('Expected a float, received an integer.');
    }
}
