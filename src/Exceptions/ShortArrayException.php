<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class ShortArrayException extends \Exception
{
    /**
     * @param  array<mixed>  $value
     */
    public static function make(array $value, int $expected): self
    {
        $actual_length = count($value);
        $term = $expected === 1 ? 'item' : 'items';

        return new self(
            "Array has too few items. Expected at least {$expected} {$term}, {$actual_length} given."
        );
    }
}
