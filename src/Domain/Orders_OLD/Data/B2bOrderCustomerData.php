<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class B2bOrderCustomerData extends Data
{
    public function __construct(
        public int $id,
        public ?string $code,
        public string $name,
    ) {
    }

    public static function fromArray(object $data) :self
    {
        return new self (
            $data->id,
            $data->code ?? '',
            $data->name,
        );
    }
}
