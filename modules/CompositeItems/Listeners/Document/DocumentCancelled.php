<?php

namespace Modules\CompositeItems\Listeners\Document;

use App\Traits\Modules;
use App\Events\Document\DocumentCancelled as Event;
use Modules\CompositeItems\Models\CompositeItem;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History as InventoryHistory;

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
        if (!$this->moduleIsEnabled('composite-items') && !$this->moduleIsEnabled('inventory')) {
            return;
        }

        $document_status = $event->document->histories()->orderByDesc('created_at')->pluck('status');

        $operation_type = config('type.operation.' . $event->document->type);

        if (!$operation_type || $document_status[1] == 'draft') {
            return;
        }

        foreach ($event->document->items as $item) {
            $composite_item = CompositeItem::canTrack()->where('item_id', $item->item->id)->first();

            if (! $composite_item) {
                continue;
            }

            foreach ($composite_item->composite_items as $key => $comp_item_item) {
                $quantity = $comp_item_item->quantity * $item->quantity;
                
                $inventory_item = InventoryItem::where('item_id', $comp_item_item->item_id)
                                               ->where('warehouse_id', $comp_item_item->warehouse_id)
                                               ->first();

                if (! $inventory_item) {
                    continue;
                }
                
                if ($operation_type == 'negative') {
                    $inventory_item->opening_stock += (float) $quantity;
                } else {
                    $inventory_item->opening_stock -= (float) $quantity;
                }

                $inventory_item->save();

                InventoryHistory::where('type_type', get_class($item))
                                ->where('type_id', $item->id)
                                ->where('item_id', $inventory_item->item->id)
                                ->where('warehouse_id', $comp_item_item->warehouse_id)
                                ->delete();
            }
        }
    }
}
