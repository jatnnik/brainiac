<?php

namespace Jannbar\Brainiac;

use Jannbar\Brainiac\Schemas\BooleanSchema;
use Jannbar\Brainiac\Schemas\NumberSchema;
use Jannbar\Brainiac\Schemas\StringSchema;

class Brainiac
{
    public static function boolean(): BooleanSchema
    {
        return new BooleanSchema();
    }

    public static function string(): StringSchema
    {
        return new StringSchema();
    }

    public static function number(): NumberSchema
    {
        return new NumberSchema();
    }
}
