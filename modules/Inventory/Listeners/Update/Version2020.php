<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;

use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\WarehouseItem;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class Version2020 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.0.20';

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

        $this->updateDatabase();
        $this->updateMigration();
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    public function updateMigration()
    {
        $inventory_items = InventoryItem::cursor();

        foreach ($inventory_items as $inventory_item) {
            $warehouse_id = WarehouseItem::where('item_id', $inventory_item->item_id)->value('warehouse_id');

            if (empty($warehouse_id)) {
                $warehouse_id = setting('inventory.default_warehouse');
            }

            $inventory_item->warehouse_id = $warehouse_id;
            $inventory_item->save();
        }
    }
}
