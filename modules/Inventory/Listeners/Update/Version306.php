<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Models\Common\Widget;
use App\Events\Install\UpdateFinished;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;
use Illuminate\Support\Facades\Artisan;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\Item as InventoryItem;

class Version306 extends Listener implements ShouldUpdateAllCompanies
{
    const ALIAS = 'inventory';

    const VERSION = '3.0.6';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

       $this->updateData();
    }

    protected function updateData()
    {
        $warehouse = Warehouse::find(1);

        if ($warehouse) {
            return;
        }

        $warehouse_id = setting('inventory.default_warehouse');

        if (!$warehouse_id) {
            $warehouse = Warehouse::first();
            $warehouse_id = $warehouse->id;
        }

        $inventory_items = InventoryItem::where('warehouse_id', 1)->get();

        foreach ($inventory_items as $inventory_item) {
            $inventory_item->warehouse_id = $warehouse_id;
            $inventory_item->update();
        }
    }
}