<?php

namespace Modules\WarehouseRoleManagement\Scopes;

use App\Traits\Scopes;
use App\Models\Common\Item;
use App\Models\Document\DocumentItem;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Document implements Scope
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

        $items = DB::table('items')->pluck('id')->toArray();

        $document_ids = DB::table('document_items')->whereIn('type', ['invoice', 'bill'])->whereIn('item_id', $items)->pluck('document_id')->toArray();

        $warehouse_ids = UserWarehouse::withTrashed()->where('user_id', user_id())->pluck('warehouse_id')->toArray();

        foreach ($document_ids as $key => $document_id) {
            $document_item_ids = DB::table('document_items')->whereIn('type', ['invoice', 'bill'])->where('document_id', $document_id)->pluck('item_id')->toArray();

            foreach ($document_item_ids as $document_item_id) {
                $id = DB::table('document_items')->whereIn('type', ['invoice', 'bill'])->where('document_id', $document_id)->where('item_id', $document_item_id)->value('id');

                $inventory_document_item_warehouse_id = InventoryDocumentItem::where('document_item_id', $id)->value('warehouse_id');

                $inventory_item = DB::table('inventory_items')->where('item_id', $document_item_id)->first();

                if (! in_array($inventory_document_item_warehouse_id, $warehouse_ids) && $inventory_item) {
                    unset($document_ids[$key]);
                }

                if (! in_array($document_item_id,  $items)) {
                    unset($document_ids[$key]);
                }
            }
        }

        return $builder->whereIn('id',  $document_ids); 
    }
}
