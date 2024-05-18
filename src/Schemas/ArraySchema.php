<?php

namespace Jannbar\Brainiac\Schemas;

use Jannbar\Brainiac\Exceptions\InvalidArrayException;
use Jannbar\Brainiac\Exceptions\LongArrayException;
use Jannbar\Brainiac\Exceptions\ShortArrayException;

class ArraySchema extends Schema
{
    private $min;

    private $max;

    public function min(int $min)
    {
        $this->min = $min;

        return $this;
    }

    public function max(int $max)
    {
        $this->max = $max;

        return $this;
    }

    protected function parse_value($value)
    {
        if (! is_array($value)) {
            throw InvalidArrayException::make($value);
        }

        if (! is_null($this->min) && count($value) < $this->min) {
            throw ShortArrayException::make($value, $this->min);
        }

        if (! is_null($this->max) && count($value) > $this->max) {
            throw LongArrayException::make($value, $this->max);
        }

        return $value;
    }
}
