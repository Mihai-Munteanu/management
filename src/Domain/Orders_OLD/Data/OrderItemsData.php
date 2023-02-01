<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class OrderItemsData extends Data
{
    public function __construct(
        public int $id,
        public int $order_id,
        public ?string $vendor_name,
        public int $status,
        public int $internal_price,
        public int $internal_msrp,
        public ?string $product_model_name,
        public ?string $product_model_sku,
        public ?string $product_model_brand,
        public ?string $product_variant_size,
        public string $product_variant_uid,
        public int $requested_quantity,
    ) {
    }

    public static function fromArray(array $data):self
    {
        return new self (
            $data['id'],
            $data['order_id'],
            $data['vendor']['name'] ?? '',
            $data['status'],
            $data['internal_price'],
            $data['internal_msrp'],
            $data['product_model_name'] ?? '',
            $data['product_model_sku'] ?? '',
            $data['product_model_brand'] ?? '',
            $data['product_variant_size'] ?? '',
            $data['product_variant_uid'],
            $data['requested_quantity'],
        );
    }

}
