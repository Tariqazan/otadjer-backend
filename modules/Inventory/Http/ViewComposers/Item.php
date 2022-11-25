<?php

namespace Modules\Inventory\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;
use Modules\Inventory\Models\Warehouse;

class Item
{
    use Modules;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $vendors = [];

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        $inventory_item = false;

        if ($view->getName() == 'common.items.index') {
            $items = $view->getData()['items'];

            $bulk_actions = app('App\BulkActions\Common\Items')->actions;

            $view->getFactory()->startSection('content', view('inventory::partials.item.index', compact('items', 'bulk_actions')));
        } else if ($view->getName() == 'common.items.edit') {
            $item = $view->getData()['item'];

            $inventory_item = $item->inventory()->first();

            $track_control = !empty($inventory_item) ? true : false;

            $view->getFactory()->startPush('enabled_input_end', view('inventory::partials.item.edit', compact('item', 'inventory_item', 'vendors', 'warehouses', 'track_control')));
        } else {
            $view->getFactory()->startPush('enabled_input_end', view('inventory::partials.item.create', compact('vendors', 'warehouses')));
        }

        // Push to a stack
        $view->getFactory()->startPush('name_input_end', view('inventory::partials.item.sku', compact('inventory_item')));

    }
}
