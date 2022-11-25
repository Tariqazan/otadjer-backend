<?php

namespace Modules\Inventory\Widgets;

use App\Abstracts\Widget;
use App\Models\Common\Item;

class TotalItem extends Widget
{
    public $default_name = 'inventory::widgets.total_item';

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
        $items = Item::get();

        $value = 0;

        foreach ($items as $item) {
            if (!$item->inventory()->first()) {
                continue;
            }
            
            $value++;
        }

        return $this->view('inventory::widgets.total_item_widget', [
            'stock' => $value,
            'name' => trans('inventory::widgets.total_item'),
            'color' => 'success'
        ]);
    }
}
