<?php

namespace Modules\WarehouseRoleManagement\Listeners;

use App\Traits\Modules;
use Modules\Inventory\Models\Warehouse;
use App\Events\Auth\UserUpdated as Event;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class UserWarehouseUpdated
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('warehouse-role-management')) {
            return;
        }

        $permission = $event->user->can('create-warehouse-role-management');

        if ($permission) {
            $this->canPermission($event);
        } else {
            $this->canNotPermission($event);
        }
    }

    protected function canNotPermission($event)
    {
        UserWarehouse::where('user_id', $event->user->id)->forceDelete();

        if (! isset($event->request->warehouses)) {
            return;
        }

        foreach ($event->request->warehouses as $warehouse_id) {
            $event->user->warehouses()->attach([$warehouse_id]);
        }
    }

    protected function canPermission($event)
    {
        UserWarehouse::where('user_id', $event->user->id)->forceDelete();

        $warehouse_ids = Warehouse::pluck('id')->toArray();

        foreach ($warehouse_ids as $warehouse_id) {
            $event->user->warehouses()->attach([$warehouse_id]);
        }
    }
}
