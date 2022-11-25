<?php

namespace Modules\Inventory\Widgets\Items;

use App\Abstracts\Widget;
use App\Models\Common\Item;

class TotalStock extends Widget
{
    public $default_name = 'inventory::widgets.total_stock';

    public $views = [
        'header' => 'partials.widgets.stats_header',
    ];

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-4'
        ];
    }

    public function show($item = null)
    {
        if ($item) {
            $this->views['header'] = 'inventory::widgets.standard_header';
        } else {
            $this->views['header'] = 'inventory::widgets.stats_header';
        }

        $stock = $item->inventory()->sum('opening_stock');


        return $this->view('inventory::widgets.show_total_stock', [
            'stock' => $stock,
        ]);
    }
}
