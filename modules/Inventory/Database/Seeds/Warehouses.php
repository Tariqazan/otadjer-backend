<?php

namespace Modules\Inventory\Database\Seeds;

use App\Traits\Jobs;
use App\Abstracts\Model;
use App\Utilities\Overrider;
use App\Models\Common\Company;
use Illuminate\Database\Seeder;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Jobs\Warehouses\CreateWarehouse;

class Warehouses extends Seeder
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
        $warehouse = Warehouse::where('name', trans('inventory::warehouses.main_warehouse'))->first();

        if (!$warehouse) {
            $warehouse_request = [
                'company_id'    => company_id(),
                'name'          => trans('inventory::warehouses.main_warehouse'),
                'enabled'       => true,
                'created_from'  => 'inventory::seed',
            ];

            $warehouse = $this->dispatch(new CreateWarehouse($warehouse_request));
        }

        setting()->set('inventory.default_warehouse', $warehouse->id);
        setting()->save();
    }
}
