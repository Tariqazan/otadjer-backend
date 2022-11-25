<?php

namespace Modules\WarehouseRoleManagement\Http\ViewComposers;

use App\Traits\Modules;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\View\View;

class WarehouseUsers
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
        if (! $this->moduleIsEnabled('inventory')) {
            return;
        }

        if ($view->getName() == 'inventory::warehouses.create') {
            $users = User::collect();

            $view->getFactory()->startPush('create_warehouse_users_start', view('warehouse-role-management::warehouses.create', compact('users')));
        } else {
            $user_roles = user()->roles()->pluck('name')->toArray();
        
            $users = null;
            
            if (in_array('admin', $user_roles)) {
                $users = User::collect();
            }
    
            $view->getData()['warehouse']->users = $view->getData()['warehouse']->users()->pluck('user_id')->toArray();

            $view->getFactory()->startPush('edit_warehouse_users_start', view('warehouse-role-management::warehouses.edit', compact('users')));
        }
    }
}
