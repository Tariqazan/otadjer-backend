<?php

namespace Modules\Estimates\Http\Controllers\Settings;

use App\Abstracts\Http\Controller;

class Estimate extends Controller
{
    public function edit()
    {
        $item_names = [
            'settings.invoice.item'    => trans('estimates::settings.estimate.item'),
            'settings.invoice.product' => trans('settings.invoice.product'),
            'settings.invoice.service' => trans('settings.invoice.service'),
            'custom'                   => trans('settings.invoice.custom'),
        ];

        $price_names = [
            'settings.invoice.price' => trans('estimates::settings.estimate.price'),
            'settings.invoice.rate'  => trans('estimates::settings.estimate.rate'),
            'custom'                 => trans('settings.invoice.custom'),
        ];

        $quantity_names = [
            'settings.invoice.quantity' => trans('estimates::settings.estimate.quantity'),
            'custom'                    => trans('settings.invoice.custom'),
        ];

        $payment_terms = [
            '0'  => trans('settings.invoice.due_receipt'),
            '15' => trans('settings.invoice.due_days', ['days' => 15]),
            '30' => trans('settings.invoice.due_days', ['days' => 30]),
            '45' => trans('settings.invoice.due_days', ['days' => 45]),
            '60' => trans('settings.invoice.due_days', ['days' => 60]),
            '90' => trans('settings.invoice.due_days', ['days' => 90]),
        ];

        return view(
            'estimates::settings.estimate',
            compact(
                'item_names',
                'price_names',
                'quantity_names',
                'payment_terms'
            )
        );
    }
}
