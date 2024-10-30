<?php

namespace Jatnnik\Brainiac\Exceptions;

final class InvalidFloatException extends \Exception
{
    public static function make(): self
    {
        return new self('Expected a float, received an integer.');
    }
}
