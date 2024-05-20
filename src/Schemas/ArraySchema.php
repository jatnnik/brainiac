<?php

namespace Jannbar\Brainiac\Schemas;

use Exception;
use Jannbar\Brainiac\Exceptions\InvalidArrayException;
use Jannbar\Brainiac\Exceptions\LongArrayException;
use Jannbar\Brainiac\Exceptions\ShortArrayException;

class ArraySchema extends Schema
{
    private int $min;

    private int $max;

    private Schema $item_schema;

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

    public function of(Schema $item_schema): self
    {
        $this->item_schema = $item_schema;

        return $this;
    }

    /**
     * @param  array<mixed>  $value
     * @return array<mixed>
     */
    protected function parse_value(array $value): array
    {
        if (! is_array($value)) {
            throw InvalidArrayException::make($value);
        }

        if (isset($this->item_schema)) {
            foreach ($value as $item) {
                $result = $this->item_schema->safe_parse($item);

                if (! $result['success']) {
                    throw new Exception('Invalid item type.');
                }
            }
        }

        if (isset($this->min) && count($value) < $this->min) {
            throw ShortArrayException::make($value, $this->min);
        }

        if (isset($this->max) && count($value) > $this->max) {
            throw LongArrayException::make($value, $this->max);
        }

        return $value;
    }
}
