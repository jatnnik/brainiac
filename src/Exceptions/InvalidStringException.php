<?php

namespace Jannbar\Brainiac\Exceptions;

final class InvalidStringException extends \Exception
{
  public static function make(mixed $value): self
  {
    $type = gettype($value);

    return new self("Expected a string, received `{$type}`.");
  }
}
