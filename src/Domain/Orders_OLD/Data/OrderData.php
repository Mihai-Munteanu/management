<?php

namespace Domain\Orders\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Domain\Orders\Data\OrderItemsData;
use Domain\Orders\Data\B2bOrderCustomerData;
use Domain\Orders\Data\OrderBillingAndShippingElementsData;
use Spatie\LaravelData\DataCollection;

class OrderData extends Data
{
public function __construct(
        public int $id,
        public string $status,
        public string $system,
        public bool $is_test,
        public string $created_at,
        public ?string $order_age,
        public ?string $b2b_customer_order_id,
        public B2bOrderCustomerData $b2b_customer,
        public ?OrderTrackData $order_track,
        public OrderBillingAndShippingElementsData $billing_address,
        public OrderBillingAndShippingElementsData $shipping_address,
        public ?DataCollection $items,
    ) {
        //
    }

    public static function fromArray(array $data) :self
    {
        $items = json_decode(json_encode($data['items'] ?? []), true);

        return new self (
            $data['id'],
            $data['status'],
            $data['system'],
            $data['is_test'] ?? false,
            Carbon::parse($data['created_at'])->format('Y-m-d H:i:s'),
            Carbon::parse(Carbon::parse($data['created_at'])->format('Y-m-d H:i:s'))->diffForHumans(now()),
            $data['b2b_customer_order_id'],
            B2bOrderCustomerData::fromArray ($data['b2b_customer']),
            OrderTrackData::from($data['order_track'] ?? []),
            OrderBillingAndShippingElementsData::from($data['billing_address'] ?? []),
            OrderBillingAndShippingElementsData::from($data['shipping_address'] ?? []),
            OrderItemsData::collection($items),
        );
    }
}
