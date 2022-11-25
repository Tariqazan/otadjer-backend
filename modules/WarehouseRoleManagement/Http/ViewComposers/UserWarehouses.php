<?php

namespace Modules\WarehouseRoleManagement\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;
use Modules\Inventory\Models\Warehouse;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class UserWarehouses
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

        $user_roles = user()->roles()->pluck('name')->toArray();
                
        if (! in_array('admin', $user_roles)) {
            return;
        }

        $selected_warehouse = [];

        if (isset($view->getData()['user'])) {
            $user = $view->getData()['user'];

            $user_roles = $user->roles()->pluck('name')->toArray();

            if (in_array('admin', $user_roles)) {
                $selected_warehouse = Warehouse::pluck('id')->toArray();
            } else {
                $selected_warehouse = UserWarehouse::withTrashed()->where('user_id', $user->id)->pluck('warehouse_id')->toArray();
            }
        }

        $warehouses = Warehouse::pluck('name', 'id');

        // Push to a stack
        $view->getFactory()->startPush('companies_input_end', view('warehouse-role-management::partials.user_warehouse', compact('warehouses', 'selected_warehouse')));
    }
}
