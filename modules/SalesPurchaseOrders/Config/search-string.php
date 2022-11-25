<?php

use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as SalesOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as PurchaseOrder;

return [
    SalesOrder::class => [
        'columns' => [
            'type'            => ['searchable' => true],
            'document_number' => ['searchable' => true],
            'order_number'    => ['searchable' => true],
            'status',
            'issued_at'       => ['date' => true],
            'amount',
            'currency_code'   => [
                'route' => 'currencies.index',
            ],
            'contact_id'      => [
                'route' => 'vendors.index',
            ],
            'contact_name'    => ['searchable' => true],
            'contact_email'   => ['searchable' => true],
            'contact_tax_number',
            'contact_phone'   => ['searchable' => true],
            'contact_address' => ['searchable' => true],
            'category_id'     => [
                'route' => ['categories.index', 'search=type:income'],
            ],
        ],
    ],

    PurchaseOrder::class => [
        'columns' => [
            'type'            => ['searchable' => true],
            'document_number' => ['searchable' => true],
            'order_number'    => ['searchable' => true],
            'status',
            'issued_at'       => ['date' => true],
            'amount',
            'currency_code'   => [
                'route' => 'currencies.index',
            ],
            'contact_id'      => [
                'route' => 'vendors.index',
            ],
            'contact_name'    => ['searchable' => true],
            'contact_email'   => ['searchable' => true],
            'contact_tax_number',
            'contact_phone'   => ['searchable' => true],
            'contact_address' => ['searchable' => true],
            'category_id'     => [
                'route' => ['categories.index', 'search=type:expense'],
            ],
        ],
    ],
];
