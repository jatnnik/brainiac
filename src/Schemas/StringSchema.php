<?php

namespace Jatnnik\Brainiac\Schemas;

use Jatnnik\Brainiac\Exceptions\InvalidStringException;
use Jatnnik\Brainiac\Exceptions\LiteralStringException;
use Jatnnik\Brainiac\Exceptions\LongStringException;
use Jatnnik\Brainiac\Exceptions\ShortStringException;

class StringSchema extends Schema
{
    private ?int $min;

    private ?int $max;

    private ?string $literal;

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

    public function literal(string $literal): self
    {
        $this->literal = $literal;

        return $this;
    }

    protected function parse_value(mixed $value): string
    {
        if (! is_string($value)) {
            throw InvalidStringException::make($value);
        }

        if (isset($this->literal) && $value !== $this->literal) {
            throw LiteralStringException::make($value, $this->literal);
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
