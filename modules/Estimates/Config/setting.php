<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Fallback
    |--------------------------------------------------------------------------
    |
    | Define fallback settings to be used in case the default is null
    |
    | Sample:
    |   "currency" => "USD",
    |
    */
    'fallback' => [
        'estimates' => [
            'estimate' => [
                'number_prefix'             => env('SETTING_FALLBACK_ESTIMATE_NUMBER_PREFIX', 'EST-'),
                'number_digit'              => env('SETTING_FALLBACK_ESTIMATE_NUMBER_DIGIT', 5),
                'number_next'               => env('SETTING_FALLBACK_ESTIMATE_NUMBER_NEXT', '1'),
                'item_name'                 => env('SETTING_FALLBACK_ESTIMATE_ITEM_NAME', 'estimates::settings.estimate.item'),
                'price_name'                => env('SETTING_FALLBACK_ESTIMATE_PRICE_NAME', 'estimates::settings.estimate.price'),
                'quantity_name'             => env('SETTING_FALLBACK_ESTIMATE_QUANTITY_NAME', 'estimates::settings.estimate.quantity'),
                'hide_item_name'            => env('SETTING_FALLBACK_ESTIMATE_HIDE_ITEM_NAME', false),
                'hide_item_description'     => env('SETTING_FALLBACK_ESTIMATE_HIDE_ITEM_DESCRIPTION', false),
                'hide_quantity'             => env('SETTING_FALLBACK_ESTIMATE_HIDE_QUANTITY', false),
                'hide_price'                => env('SETTING_FALLBACK_ESTIMATE_HIDE_PRICE', false),
                'hide_amount'               => env('SETTING_FALLBACK_ESTIMATE_HIDE_AMOUNT', false),
                'approval_terms'             => env('SETTING_FALLBACK_ESTIMATE_APPROVAL_TERMS', 0),
                'template'                  => env('SETTING_FALLBACK_ESTIMATE_TEMPLATE', 'default'),
                'color'                     => env('SETTING_FALLBACK_ESTIMATE_COLOR', '#55588b'),
            ],
            'schedule' => [
                'send_estimate_reminder' => env('SETTING_FALLBACK_SCHEDULE_SEND_ESTIMATE_REMINDER', false),
                'estimate_days' => env('SETTING_FALLBACK_ESTIMATE_DAYS', '10,5,3,1')
            ]
        ]
    ],

];
