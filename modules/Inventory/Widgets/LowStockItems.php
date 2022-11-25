<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use Modules\Inventory\Models\Item;
use App\Models\Common\Item as CoreItem;

class LowStockItems extends Widget
{
    public $default_name = 'inventory::widgets.low_stock_items';

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-4'
        ];
    }

    public function show()
    {
        $items = Item::get();
        foreach ($items as $item) {
            if ($item->reorder_level <= $item->opening_stock) {
                continue;
            }

            $core_item = CoreItem::where('id', $item->item_id)->pluck('name');
            foreach ($core_item as $name) {
            }

            $value = $item->opening_stock . '/' . $item->reorder_level;
            $sort = $item->reorder_level - $item->opening_stock;

            $low_stock[] = (object) ['sort' => $sort, 'value' => $value, 'name' => $name];
            arsort($low_stock);
        }

        if (count($items) == 0) {
            $low_stock = [];
        } elseif (count($items) > 5) {
            return $this->view('inventory::widgets.list_widget', [
                'items' => array_slice($low_stock, 0, 5),
                'title' => trans('inventory::general.stock') . '/' . trans('inventory::items.reorder_level')
            ]);
        }

        return $this->view('inventory::widgets.list_widget', [
            'items' => $low_stock,
            'title' => trans('inventory::general.stock') . '/' . trans('inventory::items.reorder_level')
        ]);
    }
}