<?php

namespace Modules\Inventory\Listeners;

use App\Events\Banking\TransactionCreated as Event;
use App\Traits\Modules;
use App\Traits\Jobs;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\History as InventoryHistory;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;
use Modules\Inventory\Models\Item as InventoryItem;

class Transaction
{
    use Modules, Jobs;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        if (!$event->transaction->document_id) {
            return;
        }

        $operation_type = config('type.operation.' . $event->transaction->document->type);

        if (!$operation_type) {
            return;
        }

        $user = user();

        if ($event->transaction->document->status == 'sent' ||
            $event->transaction->document->status == 'received' ||
            $event->transaction->document->status == 'partial' ||
            $event->transaction->document->status == 'viewed') {
            return;
        }

        foreach ($event->transaction->document->items as $document_item) {
            $warehouse_id = InventoryDocumentItem::where('document_id', $event->transaction->document->id)
                                                 ->where('document_item_id', $document_item->id)
                                                 ->value('warehouse_id');

            $inventory_item = InventoryItem::where('warehouse_id', $warehouse_id)
                                           ->where('item_id', $document_item->item_id)
                                           ->first();

            if (!$inventory_item) {
                continue;
            }

            if ($operation_type == 'negative') {
                $inventory_item->opening_stock -= (float) $document_item->quantity;
            } else {
                $inventory_item->opening_stock += (float) $document_item->quantity;
            }

            $inventory_item->save();

            InventoryHistory::where('type_type', get_class($document_item))
            ->where('type_id', $document_item->id)
            ->delete();

            $history_data = [
                'company_id' => $document_item->company_id,
                'user_id' => $user->id,
                'item_id' => $document_item->item->id,
                'type_id' => $document_item->id,
                'type_type' => get_class($document_item),
                'warehouse_id'  => !empty($warehouse_id) ? $warehouse_id : setting('inventory.default.warehouse'),
                'quantity' => $document_item->quantity,
            ];

            $this->ajaxDispatch(new CreateHistory($history_data));
        }
    }
}
