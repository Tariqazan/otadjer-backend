<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Item;
use Modules\Inventory\Models\Warehouse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class Version212 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.1.2';

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
        $items = Item::cursor();

        $warehouse_id = setting('inventory.default_warehouse');

        if (!$warehouse_id) {
            $warehouse = Warehouse::first();

            if (!$warehouse) {
                $warehouse = Warehouse::create([
                    'company_id'        => company_id(),
                    'name'              => 'Main Warehouse',
                    'default_warehouse' => 1,
                    'enabled'           => 1,
                ]);

                setting()->set('inventory.default_warehouse', $warehouse->id);
                setting()->save();
            }

            $warehouse_id = $warehouse->id;
        }

        foreach ($items as $item) {
            $inventory_item = $item->inventory()->first();

            if (empty($inventory_item)) {
                continue;
            }

            if (empty($inventory_item->warehouse_id)) {
                $inventory_item->warehouse_id = $warehouse_id;
                $inventory_item->default_warehouse = 1;
                $inventory_item->save();

                continue;
            }

            $warehouse_items = json_decode(json_encode($item->inventory()->pluck('warehouse_id')), true);

            $index = array_search($warehouse_id, $warehouse_items);

            if ($index != false) {
                $inventory_items = $item->inventory()->get();
                $inventory_items[$index]->default_warehouse = 1;
                $inventory_items[$index]->save();
            } else{
                $inventory_item = $item->inventory()->first();
                $inventory_item->default_warehouse = 1;
                $inventory_item->save();
            }
        }
    }
}
