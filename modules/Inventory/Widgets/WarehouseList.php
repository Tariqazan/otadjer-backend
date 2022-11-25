<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\Warehouse;

class WarehouseList extends Widget
{
    public $default_name = 'inventory::widgets.warehouse_list';

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-6'
        ];
    }

    public function show()
    {
        $warehouses = Warehouse::enabled()->get();
        $stocks = [];
        foreach ($warehouses as $warehouse) {
            $items = Item::where('warehouse_id', $warehouse->id)->get();

            $total = count($items);

            $stocks[] = (object) ['value' => $total, 'name' => $warehouse->name];
            arsort($stocks);
        }

        if (count($stocks) > 5) {
            return $this->view('inventory::widgets.list_widget', [
                'items' => array_slice($stocks, 0, 5),
                'title' => trans('inventory::widgets.total_item')
            ]);
        }
        
        return $this->view('inventory::widgets.list_widget', [
            'items' => $stocks,
            'title' => trans('inventory::widgets.total_item')
        ]);
    }
}