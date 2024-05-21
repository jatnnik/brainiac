<?php

namespace Jannbar\Brainiac\Schemas;

use Jannbar\Brainiac\Exceptions\InvalidStringException;
use Jannbar\Brainiac\Exceptions\LongStringException;
use Jannbar\Brainiac\Exceptions\ShortStringException;

class StringSchema extends Schema
{
    private ?int $min;

    private ?int $max;

    public function min(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function max(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    protected function parse_value(mixed $value): string
    {
        if (! is_string($value)) {
            throw InvalidStringException::make($value);
        }

        if (isset($this->min) && strlen($value) < $this->min) {
            throw ShortStringException::make($value, $this->min);
        }

        if (isset($this->max) && strlen($value) > $this->max) {
            throw LongStringException::make($value, $this->max);
        }

        return $value;
    }
}
