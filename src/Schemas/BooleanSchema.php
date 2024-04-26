<?php

namespace Jannbar\Brainiac\Schemas;

use Jannbar\Brainiac\Exceptions\InvalidBooleanException;

class BooleanSchema extends Schema
{
    protected function parse_value($value)
    {
        if (! in_array($value, [true, false], true)) {
            throw InvalidBooleanException::make($value);
        }

        return $value;
    }
}
