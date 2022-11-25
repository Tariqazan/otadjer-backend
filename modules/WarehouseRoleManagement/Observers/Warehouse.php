<?php

namespace Modules\WarehouseRoleManagement\Observers;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Abstracts\Observer;
use Modules\Inventory\Models\Warehouse as Model;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;
use Modules\WarehouseRoleManagement\Jobs\CreateUserWarehouse;
use Modules\WarehouseRoleManagement\Jobs\UpdateUserWarehouse;

class Warehouse extends Observer
{
    use Modules, Jobs;

    /**
     * Listen to the created event.
     *
     * @param  Model $warehouse
     *
     * @return void
     */
    public function created(Model $warehouse)
    {
        if (! $this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();

        if (! isset($request->users)) {
            return;
        }

        $this->dispatch(new CreateUserWarehouse($warehouse, $request));
    }

    public function saved(Model $warehouse)
    {
        if (! $this->moduleIsEnabled('inventory')) {
            return;
        }

        $method = request()->getMethod();

        if ($method == 'PATCH') {
            $this->updated($warehouse);
        }
    }

    /**
     * Listen to the created event.
     *
     * @param  Model $warehouse
     *
     * @return void
     */
    public function updated(Model $warehouse)
    {
        if (! $this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();

        if (! isset($request->users)) {
            return;
        }

        $this->dispatch(new UpdateUserWarehouse($warehouse, $request));
    }

    /**
     * Listen to the deleted event.
     *
     * @param  Model $warehouse
     *
     * @return void
     */
    public function deleted(Model $warehouse)
    {
        if (! $this->moduleIsEnabled('inventory')) {
            return;
        }

        UserWarehouse::where('warehouse_id', $warehouse->id)->forceDelete();
    }
}
