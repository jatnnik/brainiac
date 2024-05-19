<?php

namespace Jannbar\Brainiac\Exceptions;

final class InvalidArrayException extends \Exception
{
    public static function make(mixed $value): self
    {
        $type = gettype($value);

        return new self("Expected an array, received `{$type}`.");
    }
}
