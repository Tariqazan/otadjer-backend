<?php

namespace Modules\WarehouseRoleManagement\Providers;

use Modules\Inventory\Models\Warehouse;
use Illuminate\Support\ServiceProvider;

class Observer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        Warehouse::observe('Modules\WarehouseRoleManagement\Observers\Warehouse');
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
