<?php

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidBooleanException extends \Exception
{
    public static function make(mixed $value): self
    {
        $type = gettype($value);

        return new self("Expected a boolean, received `{$type}`.");
    }
}
