<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use App\Models\Common\Item;
use App\Traits\Currencies;

class TotalItemIncome extends Widget
{
    use Currencies;

    public $default_name = 'inventory::widgets.total_item_income';

    public $views = [
        'header' => 'partials.widgets.stats_header',
    ];

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-4'
        ];
    }

    public function show()
    {
        $value = 0;

        $items = Item::collect();

        foreach ($items as $item) {
            if (!isset($item->invoice_items)) {
                continue;
            }

            if (!$item->inventory()->first()) {
                continue;
            }

            foreach ($item->invoice_items as $invoice) {
                $value += $this->convertToDefault($invoice->total, $invoice->document->currency_code, $invoice->document->currency_rate);
            }
        }

        return $this->view('inventory::widgets.total_item_income_widget', [
            'stock' => $value,
            'name' => trans('inventory::widgets.total_item_income'),
            'color' => 'info'
        ]);
    }
}
