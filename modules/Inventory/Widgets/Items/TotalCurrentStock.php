<?php

namespace Modules\Inventory\Widgets\Items;

use App\Abstracts\Widget;
use Modules\Inventory\Models\History;

class TotalCurrentStock extends Widget
{
    public $default_name = 'inventory::widgets.total_current_stock';

    public $default_settings = [
        'width' => 'col-md-6',
    ];

    public function show($item = null)
    {
        foreach ($item->inventory()->get() as $inventory_item) {
            if (empty($inventory_item->warehouse)) {
                continue;
            }

            $rand_color = '#' . mt_rand(0, 999999);

            $label = $inventory_item->opening_stock . ' - ' . $inventory_item->warehouse->name;

            $this->addToDonut($rand_color, $label, $inventory_item->opening_stock);
        }

        $chart = $this->getDonutChart(trans_choice('general.incomes', 1), 0, 160, 6);

        return $this->view('inventory::widgets.donut_chart', [
            'chart' => $chart,
        ]);
    }
}
