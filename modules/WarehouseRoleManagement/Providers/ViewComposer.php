<?php

namespace Modules\WarehouseRoleManagement\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'auth.users.create',
                'auth.users.edit'
            ], 
            'Modules\WarehouseRoleManagement\Http\ViewComposers\UserWarehouses'
        );

        View::composer(
            [
                'inventory::warehouses.create',
                'inventory::warehouses.edit',
            ],
            'Modules\WarehouseRoleManagement\Http\ViewComposers\WarehouseUsers'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
