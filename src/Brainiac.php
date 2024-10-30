<?php

namespace Jatnnik\Brainiac;

use Jatnnik\Brainiac\Schemas\ArraySchema;
use Jatnnik\Brainiac\Schemas\BooleanSchema;
use Jatnnik\Brainiac\Schemas\NumberSchema;
use Jatnnik\Brainiac\Schemas\StringSchema;

class Brainiac
{
    public static function array(): ArraySchema
    {
        return new ArraySchema();
    }

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
