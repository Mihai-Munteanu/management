<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class SelectProductsData extends Data
{
    public function __construct(
        public int $id,
        public int $api,
        public int $sp,
        public string $sku,
        public array $sizes
    ) {
    }

    public static function fromArray(array $data) :self
    {
        return new self (
            $data['id'],
            $data['API'],
            $data['SP'],
            $data['sku'],
            $data['sizes'],
        );
    }
}
