<?php

namespace Modules\WarehouseRoleManagement\Scopes;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Modules\WarehouseRoleManagement\Models\InventoryItem as Test;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class Item implements Scope
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
        if (user()->can('read-warehouse-role-management')) {      
            return;
        }

        $all_items = Test::all(['item_id', 'warehouse_id'])->toArray();

        $warehouse_ids = UserWarehouse::withTrashed()->where('user_id', user_id())->pluck('warehouse_id')->toArray();

        if ($warehouse_ids) {
            $inventory_items = InventoryItem::whereIn('warehouse_id', $warehouse_ids)->get(['item_id', 'warehouse_id'])->toArray();

            $item_ids = [];
            foreach ($all_items as $key => $item) {
                $item_ids[] = $item['item_id'];
            }
            
            $inventory_item_ids = [];
            foreach ($inventory_items as $key => $item) {
                $inventory_item_ids[] = $item['item_id'];
            }

            $array_unique = array_unique($item_ids);

            foreach ($inventory_item_ids as $item) {
                $key = (string) array_search($item, $array_unique);
               
                if (in_array($item, $array_unique) && $key != null) {
                    
                    unset($array_unique[$key]);
                }
            }

            return $builder->whereNotIn('id',  $array_unique);
        }   
    }
}
