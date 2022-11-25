<?php

namespace Modules\Inventory\Observers\Document;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Abstracts\Observer;
use App\Models\Common\Item;
use App\Models\Common\Company;
use Modules\Inventory\Models\History;
use App\Models\Document\Document as Model;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Jobs\Items\CreateInventoryItem;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;

class Document extends Observer
{
    use Modules, Jobs;

    /**
     * Listen to the created event.
     *
     * @param  Model $document
     *
     * @return void
     */
    public function updated(Model $document)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();
        $segments = $request->segments();

        if (!isset($segments[3]) || isset($segments[4])) {
            return;
        }

        if (!$request->items && $request->is('*/duplicate') == true) {
            return;
        }

        $user = user();

        if (!$user) {
            $company = Company::find($document->company_id);

            $user = $company->users()->first();
        }

        $operation_type = config('type.operation.' . $document->type);

        if (!$operation_type) {
            return;
        }

        $update_document = Model::find($document->id);

        if (!$request->items) {
            return;
        }

        InventoryDocumentItem::where('document_id', $document->id)->delete();

        foreach ($request->items as $key => $inventory_item) {
            $warehouse_duplicate = false;

            $update_document_item = InventoryDocumentItem::where('document_item_id', $update_document->items[$key]->id)->first();

            $warehouse_ids = InventoryDocumentItem::where('document_id', $update_document->id)
                                                  ->where('item_id', $update_document->items[$key]->item_id)
                                                  ->pluck('warehouse_id');

            foreach ($warehouse_ids as $warehouse_id) {
                if (isset($inventory_item['warehouse_id']) && $warehouse_id == $inventory_item['warehouse_id']) {
                    $warehouse_duplicate = true;
                }
            }

            if ($warehouse_duplicate == true || $update_document_item) {
                continue;
            }

            if (isset($inventory_item['unit'])) {
                $this->createInventoryItem($update_document, $key, $inventory_item, $user);
            }

            if (isset($inventory_item['warehouse_id'])) {
                InventoryDocumentItem::where('document_item_id', $update_document->items[$key]->id)->delete();

                InventoryDocumentItem::create([
                    'company_id'        => company_id(),
                    'type'              => $update_document->type,
                    'document_id'       => $update_document->id,
                    'document_item_id'  => $update_document->items[$key]->id,
                    'item_id'           => $update_document->items[$key]->item_id,
                    'warehouse_id'      => $inventory_item['warehouse_id'],
                    'quantity'          => $inventory_item['quantity'],
                    'created_from'      => 'inventory::ui',
                    'created_by'        => user()->id,
                ]);
            }
        }

        $status = ['paid', 'partial', 'sent', 'received'];

        if (in_array($document->status, $status)) {
            foreach ($update_document->items as $key => $update_item) {
                $update_warehouse_id = InventoryDocumentItem::where('document_id', $update_document->id)
                                                            ->where('document_item_id', $update_item->id)
                                                            ->value('warehouse_id');

                $update_inventory_item = InventoryItem::where('warehouse_id', $update_warehouse_id)
                                                      ->where('item_id', $update_item->item_id)
                                                      ->first();

                if (empty($update_inventory_item)) {
                    continue;
                }

                if ($operation_type == 'negative') {
                    $update_inventory_item->opening_stock -= (float) $update_item->quantity;
                } else {
                    $update_inventory_item->opening_stock += (float) $update_item->quantity;
                }

                $update_inventory_item->save();

                History::where('type_type', get_class($update_item))
                       ->where('type_id', $update_item->id)
                       ->where('warehouse_id', $update_inventory_item->warehouse_id)
                       ->delete();

                $history_data =[
                    'company_id'    => company_id(),
                    'user_id'       => $user->id,
                    'item_id'       => $update_item->item->id,
                    'type_id'       => $update_item->id,
                    'type_type'     => get_class($update_item),
                    'warehouse_id'  => !empty($update_warehouse_id) ? $update_warehouse_id : setting('inventory.default.warehouse'),
                    'quantity'      => $update_item->quantity,
                ];

                $this->dispatch(new CreateHistory($history_data));
           }
        }
    }

    public function createInventoryItem($update_document, $key, $inventory_item, $user)
    {
        $item = Item::find($update_document->items[$key]->item_id);

        $item_data = InventoryItem::create([
            'company_id' => company_id(),
            'item_id' => $item->id,
            'opening_stock' => $inventory_item['quantity'],
            'opening_stock_value' => $inventory_item['quantity'],
            'reorder_level' => 0,
            'warehouse_id' => $inventory_item['warehouse_id'],
            'default_warehouse' => true,
            'sku' => rand(1000, 10000),
            'unit' => $inventory_item['unit'],
            'returnable' => false,
        ]);

        $this->dispatch(new CreateInventoryItem($item_data));

        $history_data =[
            'company_id' => company_id(),
            'user_id' => $user->id,
            'item_id' => $item->id,
            'type_id' => $item->id,
            'type_type' => get_class($item),
            'warehouse_id' => $inventory_item['warehouse_id'],
            'quantity' => $inventory_item['quantity'],
        ];

        $this->dispatch(new CreateHistory($history_data));
    }
}
