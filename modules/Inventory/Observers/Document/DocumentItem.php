<?php

namespace Modules\Inventory\Observers\Document;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Abstracts\Observer;
use App\Models\Common\Company;
use App\Models\Document\Document;
use Modules\Inventory\Models\History;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Jobs\Items\CreateInventoryItem;
use App\Models\Document\DocumentItem as DocumentItemModel;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;

class DocumentItem extends Observer
{
    use Modules, Jobs;

     /**
     * Listen to the created event.
     *
     * @param  DocumentItemModel $document_item
     *
     * @return void
     */
    public function created(DocumentItemModel $document_item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $document = $document_item->document;

        $user = user();

        if (!$user) {
            $company = Company::find($document_item->company_id);

            $user = $company->users()->first();
        }

        $item = $document_item->item;

        if (!$item) {
            return;
        }

        $request = request();

        $clone = $request->is('*/duplicate');

        if (!$request->items && $clone == false) {
            return;
        }

        $segments = $request->segments();

        if (isset($segments[3]) && !isset($segments[4])) {
            return;
        }

        if ($clone) {
            $request = Document::find($segments[3]);

            if ($request->type == 'invoice' || !$request->type == 'bill') {
                foreach ($request->items as $request_item) {
                    $warehouse_id = InventoryDocumentItem::where('document_id', $request_item->document_id)->where('item_id', $request_item->item_id)->value('warehouse_id');
                    if ($warehouse_id) {
                        $request_item->warehouse_id = $warehouse_id;
                    }
                }
            }
        }

        $operation_type = config('type.operation.' . $document_item->type);

        if (!$operation_type) {
            return;
        }

        foreach ($request->items as $inventory_item) {
            $inv_document_item = InventoryDocumentItem::where('document_item_id', $document_item->id)->first();

            if ($inv_document_item) {
                continue;
            }

            if ($inventory_item['name'] == $item->name &&
                $inventory_item['quantity'] == $document_item->quantity &&
                isset($inventory_item['unit'])
            ) {
                $item_data = [
                    'company_id' => company_id(),
                    'item_id' => $document_item->item_id,
                    'opening_stock' => $inventory_item['quantity'],
                    'opening_stock_value' => $inventory_item['quantity'],
                    'reorder_level' => 0,
                    'warehouse_id' => $inventory_item['warehouse_id'],
                    'default_warehouse' => true,
                    'sku' => rand(1000, 10000),
                    'unit' => $inventory_item['unit'],
                    'returnable' => false,
                ];

                $this->dispatch(new CreateInventoryItem($item_data));

                $history_data = [
                    'company_id' => company_id(),
                    'user_id' => $user->id,
                    'item_id' => $document_item->item_id,
                    'type_id' => $document_item->item_id,
                    'type_type' => get_class($item),
                    'warehouse_id' => $inventory_item['warehouse_id'],
                    'quantity' => $inventory_item['quantity'],
                ];

                $this->dispatch(new CreateHistory($history_data));
            }

            if ($inventory_item['name'] == $item->name &&
                $inventory_item['quantity'] == $document_item->quantity &&
                isset($inventory_item['warehouse_id'])
            ) {
                InventoryDocumentItem::where('document_item_id', $document_item->id)->delete();

                InventoryDocumentItem::create([
                    'company_id'        => $document_item->company_id,
                    'type'              => $document_item->type,
                    'document_id'       => $document_item->document_id,
                    'document_item_id'  => $document_item->id,
                    'item_id'           => $document_item->item_id,
                    'warehouse_id'      => $inventory_item['warehouse_id'],
                    'quantity'          => $inventory_item['quantity'],
                    'created_from'      => 'inventory::ui',
                    'created_by'        => user()->id,
                ]);
            }
        }
    }

    /**
     * Listen to the deleted event.
     *
     * @param  DocumentItemModel $document_item
     *
     * @return void
     */
    public function deleted(DocumentItemModel $document_item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $item = $document_item->item;

        if (!$item) {
            return;
        }

        $inventory_document_item = InventoryDocumentItem::where('document_item_id', $document_item->id)->first();

        if (!$inventory_document_item) {
            return;
        }

        $inventory_item = $item->inventory()
                               ->where('item_id', $inventory_document_item->item_id)
                               ->where('warehouse_id', $inventory_document_item->warehouse_id)
                               ->first();

        $operation_type = config('type.operation.' . $document_item->type);

        if (!$inventory_item ||
            !$operation_type ||
            $document_item->document->status == 'draft' ||
            $document_item->document->status == 'cancelled'
        ) {
            return;
        }

        if ($operation_type == 'negative') {
            $inventory_item->opening_stock += (float) $document_item->quantity;
        } else {
            $inventory_item->opening_stock -= (float) $document_item->quantity;
        }

        $inventory_item->save();

        History::where('type_type', get_class($document_item))
                ->where('type_id', $document_item->id)
                ->delete();
    }
}
