<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use App\Models\Common\Item;
use App\Traits\Currencies;

class TopSellerItems extends Widget
{
    use Currencies;

    public $default_name = 'inventory::widgets.top_seller_items';

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-6'
        ];
    }

    public function show()
    {
        $items = Item::collect();
        $top_seller = [];

        foreach ($items as $item) {
            if (!isset($item->invoice_items)) {
                continue;
            }

            if (!$item->inventory()->first()) {
                continue;
            }

            $value = 0;

            foreach ($item->invoice_items as $invoice) {
                $value += $this->convertToDefault($invoice->total, $invoice->document->currency_code, $invoice->document->currency_rate);
            }

            $top_seller[] = (object) [
                'value' =>  $value,
                'name'  => $item->name
            ];

        }

        arsort($top_seller);


        if (count($top_seller) > 5) {
            return $this->view('inventory::widgets.top_seller_item', [
                'items' => array_slice($top_seller, 0, 5),
                'title' => trans('inventory::widgets.top_seller_items')
            ]);
        }

        return $this->view('inventory::widgets.top_seller_item', [
            'items' => $top_seller,
            'title' => trans('inventory::widgets.top_seller_items')
        ]);
    }
}
