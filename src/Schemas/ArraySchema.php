<?php

namespace Jannbar\Brainiac\Schemas;

use Exception;
use Jannbar\Brainiac\Exceptions\InvalidArrayException;
use Jannbar\Brainiac\Exceptions\LongArrayException;
use Jannbar\Brainiac\Exceptions\ShortArrayException;

class ArraySchema extends Schema
{
  private $min;

  private $max;

  private $item_schema;

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

  public function of(Schema $item_schema)
  {
    $this->item_schema = $item_schema;

    return $this;
  }

  protected function parse_value($value)
  {
    if (!is_array($value)) {
      throw InvalidArrayException::make($value);
    }

    if (!is_null($this->item_schema)) {
      foreach ($value as $item) {
        $result = $this->item_schema->safe_parse($item);

        if (!$result["success"]) {
          throw new Exception("Invalid item type.");
        }
      }
    }

    if (!is_null($this->min) && count($value) < $this->min) {
      throw ShortArrayException::make($value, $this->min);
    }

    if (!is_null($this->max) && count($value) > $this->max) {
      throw LongArrayException::make($value, $this->max);
    }

    return $value;
  }
}
