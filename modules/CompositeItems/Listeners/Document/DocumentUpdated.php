<?php

namespace Modules\CompositeItems\Listeners\Document;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Events\Document\DocumentUpdated as Event;
use Modules\CompositeItems\Models\CompositeItem;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History as InventoryHistory;

class DocumentUpdated
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
        if (!$this->moduleIsEnabled('composite-items') && !$this->moduleIsEnabled('inventory')) {
            return;
        }

        if ($event->document->status == 'cancelled' ||
            $event->document->status == 'draft' ||
            $event->document->status == 'partial' ||
            $event->document->status == 'viewed') {
            return;
        }

        $user = user();
        $user_id = !empty($user) ? $user->id : 0;

        $operation_type = config('type.operation.' . $event->document->type);

        if (!$operation_type) {
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
                    $inventory_item->opening_stock -= (float) $quantity;
                } else {
                    $inventory_item->opening_stock += (float) $quantity;
                }

                $inventory_item->save();

                InventoryHistory::where('type_type', get_class($item))
                    ->where('type_id', $item->id)
                    ->where('item_id', $inventory_item->item->id)
                    ->where('warehouse_id', $comp_item_item->warehouse_id)
                    ->delete();

                $history_data = [
                    'company_id'    => $item->company_id,
                    'user_id'       => $user_id,
                    'item_id'       => $inventory_item->item->id,
                    'type_id'       => $item->id,
                    'type_type'     => get_class($item),
                    'warehouse_id'  => $comp_item_item->warehouse_id ?? setting('inventory.default.warehouse'),
                    'quantity'      => $quantity,
                ];

                $this->ajaxDispatch(new CreateHistory($history_data));
            }
        }
    }
}
