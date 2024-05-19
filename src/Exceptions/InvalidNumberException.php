<?php

namespace Jannbar\Brainiac\Exceptions;

final class InvalidNumberException extends \Exception
{
  public static function make(mixed $value): self
  {
    $type = gettype($value);

    return new self("Expected a number, received `{$type}`.");
  }
}
