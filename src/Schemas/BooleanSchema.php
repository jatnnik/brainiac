<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Schemas;

use Jatnnik\Brainiac\Exceptions\InvalidBooleanException;

class BooleanSchema extends Schema
{
    protected function parse_value(mixed $value): bool
    {
        if (! in_array($value, [true, false], true)) {
            throw InvalidBooleanException::make($value);
        }

        return $value;
    }
}
