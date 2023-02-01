<?php

namespace Domain\Orders\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Domain\Orders\Data\B2bOrderCustomerData;
use Domain\Orders\Data\OrderBillingAndShippingElementsData;

// todo* to delete
class OrderElementsData extends Data
{
public function __construct(
        public int $id,
        public string $status,
        public string $system,
        public bool $is_test,
        public string $created_at,
        public ?string $order_age,
        public ?string $b2b_customer_order_id,
        public string $b2b_customer,
        // public OrderTrackData $order_tracker,

    ) {
        //
    }

    public static function fromArray(array $data) :self
    {
        return new self (
            $data['id'],
            $data['status'],
            $data['system'],
            $data['is_test'] ?? false,
            Carbon::parse($data['created_at'])->format('Y-m-d H:i:s'),
            Carbon::parse(Carbon::parse($data['created_at'])->format('Y-m-d H:i:s'))->diffForHumans(now()),
            $data['b2b_customer_order_id'],
            $data['b2b_customer']['name'],
            // OrderTrackData::from($data['order_track']),
        );
    }
}
