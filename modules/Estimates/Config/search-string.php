<?php

use Modules\Estimates\Models\Estimate;

return [
    Estimate::class    => [
        'columns' => [
            'document_number' => ['searchable' => true],
            'order_number'    => ['searchable' => true],
            'status',
            'issued_at'       => [
                'date' => true,
            ],
//            'due_at'          => ['date' => true],
            'amount',
            'currency_code'   => [
                'route' => 'currencies.index',
            ],
            'contact_id'      => [
                'route' => 'customers.index',
            ],
            'contact_name'    => ['searchable' => true],
            'contact_email'   => ['searchable' => true],
            'contact_tax_number',
            'contact_phone'   => ['searchable' => true],
            'contact_address' => ['searchable' => true],
            'category_id'     => [
                'route' => ['categories.index', 'search=type:income'],
            ],
            'parent_id',
        ],
    ],
    'portal-estimates' => [
        'columns' => [
            'document_number' => ['searchable' => true],
            'order_number'    => ['searchable' => true],
            'status',
            'issued_at'       => [
                'date' => true,
            ],
//            'due_at'          => ['date' => true],
            'amount',
            'currency_code'   => [
                'route' => 'portal.payment.currencies',
            ],
            'parent_id',
        ],
    ],

];
