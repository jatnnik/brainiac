<?php

namespace Jannbar\Brainiac\Schemas;

use Jannbar\Brainiac\Exceptions\BigNumberException;
use Jannbar\Brainiac\Exceptions\InvalidFloatException;
use Jannbar\Brainiac\Exceptions\InvalidIntegerException;
use Jannbar\Brainiac\Exceptions\InvalidNumberException;
use Jannbar\Brainiac\Exceptions\SmallNumberException;

class NumberSchema extends Schema
{
    private ?int $min;

    private ?int $max;

    private ?bool $integer;

    private ?bool $float;

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

    public function int(): self
    {
        $this->integer = true;

        return $this;
    }

    public function float(): self
    {
        $this->float = true;

        return $this;
    }

    protected function parse_value(mixed $value): float|int
    {
        if (! is_numeric($value)) {
            throw InvalidNumberException::make($value);
        }

        // Make sure that numeric strings, integers and floats are numbers.
        $value = $value + 0;

        if (isset($this->integer) && (int) $value !== $value) {
            throw InvalidIntegerException::make();
        }

        if (isset($this->float) && (int) $value === $value) {
            throw InvalidFloatException::make();
        }

        if (isset($this->min) && $value < $this->min) {
            throw SmallNumberException::make($value, $this->min);
        }

        if (isset($this->max) && $value > $this->max) {
            throw BigNumberException::make($value, $this->max);
        }

        return $value;
    }
}
