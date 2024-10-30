<?php

namespace Jatnnik\Brainiac\Schemas;

abstract class Schema
{
    public function parse(mixed $value): mixed
    {
        return $this->parse_value($value);
    }

    /**
     * @return array{'success': bool, "data"?: mixed, "error"?: string}
     */
    public function safe_parse(mixed $value): array
    {
        try {
            $result = $this->parse($value);

            return [
                'success' => true,
                'data' => $result,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    abstract protected function parse_value(mixed $value): mixed;
}
