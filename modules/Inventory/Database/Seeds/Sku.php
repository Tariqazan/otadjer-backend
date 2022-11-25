<?php

namespace Modules\Inventory\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Item;
use App\Traits\Jobs;
use Illuminate\Database\Seeder;
use Modules\Inventory\Jobs\Items\CreateInventoryItem;

class Sku extends Seeder
{
    use jobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->create();

        Model::reguard();
    }

    private function create()
    {
        $company_id = $this->command->argument('company');

        $items = Item::all();

        foreach ($items as $item) {
            $inventory_item = $item->inventory()->first();

            $sku = 0;

            if (isset($item->sku)) {
                $sku = $item->sku;
            }

            if (empty($inventory_item)) {
                $inventory_item_request = [
                    'company_id'            => company_id(),
                    'item_id'               => $item->id,
                    'sku'                   => $sku,
                    'opening_stock'         => $item->quantity,
                    'opening_stock_value'   => $item->quantity,
                    'warehouse_id'          => setting('inventory.default_warehouse'),
                    'default_warehouse'     => 1,
                    'unit'                  => 'units',
                    'returnable'            => false,
                    'created_from'          => 'inventory::seed',
                ];

                $this->dispatch(new CreateInventoryItem($inventory_item_request));
            } else {
                $inventory_item->update([
                    'created_from'  => 'inventory::seed',
                    'opening_stock' => $item->quantity,
                    'sku'           => $sku,
                ]);
            }
        }

        setting()->set('inventory.sku_transferred', 1);
        setting()->save();
    }
}
