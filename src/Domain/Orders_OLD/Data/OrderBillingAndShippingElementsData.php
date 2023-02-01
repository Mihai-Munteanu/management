<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class OrderBillingAndShippingElementsData extends Data
{
    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $email,
        public ?string $address,
        public ?string $phone,
        public ?string $zipcode,
        public ?string $city,
        public ?string $province,
        public ?string $state,
        public ?string $country,
    ) {
    }
}
