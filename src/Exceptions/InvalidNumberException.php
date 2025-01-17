<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidNumberException extends \Exception
{
    public static function make(mixed $value): self
    {
        $type = gettype($value);

        return new self("Expected a number, received `{$type}`.");
    }
}
