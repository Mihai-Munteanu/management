<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

// todo* to delete this as it is no more needed
class OrderBillingAddressForPdfData extends Data
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
