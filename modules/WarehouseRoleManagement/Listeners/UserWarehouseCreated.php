<?php

namespace Modules\WarehouseRoleManagement\Listeners;

use App\Traits\Modules;
use Modules\Inventory\Models\Warehouse;
use App\Events\Auth\UserCreated as Event;

class UserWarehouseCreated
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
        if (! $this->moduleIsEnabled('warehouse-role-management')) {
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
        if (! isset($event->request->warehouses)) {
            return;
        }

        $user_warehouses = $event->user->warehouses()->pluck('warehouse_id')->toArray();

        foreach ($event->request->warehouses as $warehouse_id) {
            if ($user_warehouses && in_array($warehouse_id, $user_warehouses)) {
                continue;
            }

            $event->user->warehouses()->attach([$warehouse_id]);
        }
    }

    protected function canPermission($event)
    {
        $warehouse_ids = Warehouse::pluck('id')->toArray();

        foreach ($warehouse_ids as $warehouse_id) {
            $event->user->warehouses()->attach([$warehouse_id]);
        }
    }
}
