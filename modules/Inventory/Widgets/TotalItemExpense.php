<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use App\Models\Common\Item;
use App\Traits\Currencies;

class TotalItemExpense extends Widget
{
    use Currencies;

    public $default_name = 'inventory::widgets.total_item_expense';

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
            if (!isset($item->bill_items)) {
                continue;
            }

            if (!$item->inventory()->first()) {
                continue;
            }

            foreach ($item->bill_items as $bill) {
                $value += $this->convertToDefault($bill->total, $bill->document->currency_code, $bill->document->currency_rate);
            }
        }

        return $this->view('inventory::widgets.total_item_expense_widget', [
            'stock' => $value,
            'name' => trans('inventory::widgets.total_item_expense'),
            'color' => 'danger'
        ]);
    }
}
