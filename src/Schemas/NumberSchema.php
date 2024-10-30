<?php

namespace Jatnnik\Brainiac\Schemas;

use Jatnnik\Brainiac\Exceptions\BigNumberException;
use Jatnnik\Brainiac\Exceptions\InvalidFloatException;
use Jatnnik\Brainiac\Exceptions\InvalidIntegerException;
use Jatnnik\Brainiac\Exceptions\InvalidNumberException;
use Jatnnik\Brainiac\Exceptions\LiteralNumberException;
use Jatnnik\Brainiac\Exceptions\NegativeNumberException;
use Jatnnik\Brainiac\Exceptions\PositiveNumberException;
use Jatnnik\Brainiac\Exceptions\SmallNumberException;

class NumberSchema extends Schema
{
    private ?int $min;

    private ?int $max;

    private ?bool $integer;

    private ?bool $float;

    private ?bool $positive;

    private ?bool $negative;

    private int|float|null $literal;

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

    public function positive(): self
    {
        $this->positive = true;

        return $this;
    }

    public function negative(): self
    {
        $this->negative = true;

        return $this;
    }

    public function literal(int|float $literal): self
    {
        $this->literal = $literal;

        return $this;
    }

    protected function parse_value(mixed $value): float|int
    {
        if (! is_numeric($value)) {
            throw InvalidNumberException::make($value);
        }

        // Make sure that numeric strings, integers and floats are numbers.
        $value = $value + 0;

        if (isset($this->literal) && $value !== $this->literal) {
            throw LiteralNumberException::make($value, $this->literal);
        }

        if (isset($this->integer) && (int) $value !== $value) {
            throw InvalidIntegerException::make();
        }

        if (isset($this->float) && (int) $value === $value) {
            throw InvalidFloatException::make();
        }

        if (isset($this->positive) && $value < 0) {
            throw PositiveNumberException::make();
        }

        if (isset($this->negative) && $value > 0) {
            throw NegativeNumberException::make();
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
