<?php

use Modules\Estimates\Models\Estimate;

return [
    // Documents
    Estimate::TYPE => [
        'alias'               => 'estimates',
        'route'               => [
            'prefix'    => 'estimates',
            'parameter' => 'estimate',
        ],
        'permission'          => [
            'prefix' => 'estimates',
        ],
        'translation'         => [
            'prefix' => 'estimates',
        ],
        'setting'             => [
            'prefix' => 'estimate',
        ],
        'category_type'       => 'income',
        'transaction_type'    => 'income',
        'contact_type'        => 'customer',
        'image_empty_page'    => 'public/img/empty_pages/invoices.png',
        'docs_path'           => 'https://otadjer.com/apps/estimates',
        'search_string_model' => Estimate::class,
    ],
];
