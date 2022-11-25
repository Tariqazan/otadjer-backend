<?php

namespace Modules\WarehouseRoleManagement\Providers;

use App\Models\Auth\User;
use Illuminate\Support\ServiceProvider;
use Modules\Inventory\Models\Warehouse;

class DynamicRelations extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // User get warehouses
        User::resolveRelationUsing('warehouses', function ($user) {
            return $user->belongsToMany('Modules\Inventory\Models\Warehouse', 'Modules\WarehouseRoleManagement\Models\UserWarehouse');
        });

        // User get warehouses
        Warehouse::resolveRelationUsing('users', function ($user) {
            return $user->belongsToMany('App\Models\Auth\User', 'Modules\WarehouseRoleManagement\Models\UserWarehouse');
        });

        // User::resolveRelationUsing('user_warehouse', function ($user) {
        //     return $user->belongsToMany('App\Models\Auth\User', 'Modules\Inventory\Models\UserWarehouse');
        // });

        // User get warehouse
        User::resolveRelationUsing('warehouse', function ($user) {
            return $user->warehouses()->first();
        });

    }

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
