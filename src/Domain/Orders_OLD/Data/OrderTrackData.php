<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class OrderTrackData extends Data
{
    public function __construct(
        // public int $id,
        // public int $order_id,
        public ?string $tracking_no,
        // public ?string $tracking_url,
    ) {
    }
}
