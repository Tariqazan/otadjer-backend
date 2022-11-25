<?php

namespace Modules\WarehouseRoleManagement\Scopes;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Models\Item as InventoryItemModel;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class InventoryItem implements Scope
{
    use Scopes;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (user()->can('read-warehouse-role-management') 
            || array_search('estimates', request()->segments())
            || array_search('sales-orders', request()->segments())
            || array_search('purchase-orders', request()->segments())
            || array_search('credit-notes', request()->segments())
            || array_search('debit-notes', request()->segments())
            ) {      
            return;
        }
        
        $warehouse_ids = UserWarehouse::withTrashed()->where('user_id', user_id())->pluck('warehouse_id')->toArray();

        if ($warehouse_ids) {
            return $builder->whereIn('warehouse_id', array_unique($warehouse_ids));
        }  
    }
}
