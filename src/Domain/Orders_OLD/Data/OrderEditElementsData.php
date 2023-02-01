<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;
use Domain\Orders\Data\OrderEditElementData;

// todo* to delete this class
class OrderEditElementsData extends Data
{
    public function __construct(
        public OrderEditElementData $orderElements,
    ) {
    }

    public static function fromArray(array $data):self
    {
        return new self (
            OrderEditElementData::from($data['orderElements']),
        );
    }
}
