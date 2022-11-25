<?php

namespace Modules\Inventory\Widgets\Warehouses;

use App\Abstracts\Widget;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\Warehouse;

class TotalStockValue extends Widget
{
    public $default_name = 'inventory::widgets.total_stock_value';

    public $views = [
        'header' => 'partials.widgets.stats_header',
    ];

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-6'
        ];
    }

    public function show(Warehouse $warehouse)
    {
        $items = Item::where('warehouse_id', $warehouse->id)->pluck('opening_stock_value');

        $total = 0;
        foreach ($items as $item) {
            $total += $item;
        }

        return $this->view('inventory::widgets.show_total_stock_warehouse', [
            'stock' => $total,
            'color' => 'info',
            'name'  => trans('inventory::widgets.total_stock_value'),
        ]);
    }
}
