<?php

namespace Modules\Inventory\Listeners\Document;

use App\Traits\Modules;
use App\Models\Document\Document;
use App\Events\Document\DocumentCancelled as Event;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History as InventoryHistory;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;

class DocumentCancelled
{
    use Modules;

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

        $document_status = $event->document->histories()->orderByDesc('created_at')->pluck('status');

        $operation_type = config('type.operation.' . $event->document->type);

        if (!$operation_type || $document_status[1] == 'draft') {
            return;
        }

        foreach ($event->document->items as $document_item) {
            $warehouse_id = InventoryDocumentItem::where('document_id', $event->document->id)->where('document_item_id', $document_item->id)->value('warehouse_id');

            $inventory_item = InventoryItem::where('warehouse_id', $warehouse_id)->where('item_id', $document_item->item_id)->first();

            if (empty($inventory_item)) {
                continue;
            }

            if ($operation_type == 'negative') {
                $inventory_item->opening_stock += (float) $document_item->quantity;
            } else {
                $inventory_item->opening_stock -= (float) $document_item->quantity;
            }

            $inventory_item->save();

            InventoryHistory::where('type_type', get_class($document_item))->where('type_id', $document_item->id)->delete();
        }
    }
}
