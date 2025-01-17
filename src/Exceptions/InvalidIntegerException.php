<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidIntegerException extends \Exception
{
    public static function make(): self
    {
        return new self('Expected an integer, received a float.');
    }
}
