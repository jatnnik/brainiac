<?php

namespace Jannbar\Brainiac\Schemas;

abstract class Schema
{
    public function parse($value)
    {
        return $this->parse_value($value);
    }

    public function safe_parse($value)
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

    abstract protected function parse_value($value);
}
