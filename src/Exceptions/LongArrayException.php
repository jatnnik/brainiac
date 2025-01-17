<?php

declare(strict_types=1);

namespace Jatnnik\Brainiac\Exceptions;

final class LongArrayException extends \Exception
{
    /**
     * @param  array<mixed>  $value
     */
    public static function make(array $value, int $expected): self
    {
        $actual_length = count($value);
        $term = $expected === 1 ? 'item' : 'items';

        return new self(
            "Array has too many items. Expected at most {$expected} {$term}, {$actual_length} given."
        );
    }
}
