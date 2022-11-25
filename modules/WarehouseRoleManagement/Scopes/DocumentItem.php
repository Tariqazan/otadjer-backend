<?php

namespace Modules\WarehouseRoleManagement\Scopes;

use App\Traits\Scopes;
use App\Models\Common\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;
use Illuminate\Support\Facades\DB;

class DocumentItem implements Scope
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

        $item_ids = DB::table('items')->pluck('id')->toArray();

        $warehouse_ids = UserWarehouse::withTrashed()->where('user_id', user_id())->pluck('warehouse_id')->toArray();

        foreach ($item_ids as $key => $item_id) {
            $inventory_item_warehouse_ids = DB::table('inventory_items')->where('item_id', $item_id)->pluck('warehouse_id')->toArray();

            $x = false;
            foreach ($inventory_item_warehouse_ids as $key => $inventory_item_warehouse_id) {
                if (! in_array($inventory_item_warehouse_id, array_unique($warehouse_ids))) {
                    $x = true;
                }
            }

            if ($x == true) {
                unset($item_ids[$key]);
            }
        }
       
        return $builder->whereIn('item_id',  $item_ids); 
    }
}
