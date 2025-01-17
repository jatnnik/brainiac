<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidArrayException extends \Exception
{
    public static function make(mixed $value): self
    {
        $type = gettype($value);

        return new self("Expected an array, received `{$type}`.");
    }
}
