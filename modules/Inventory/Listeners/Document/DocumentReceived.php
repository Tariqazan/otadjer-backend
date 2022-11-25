<?php

namespace Modules\Inventory\Listeners\Document;

use App\Events\Document\DocumentReceived as Event;
use App\Traits\Modules;
use App\Traits\Jobs;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\History as InventoryHistory;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;
use Modules\Inventory\Models\Item as InventoryItem;

class DocumentReceived
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

        $operation_type = config('type.operation.' . $event->document->type);

        if (!$operation_type) {
            return;
        }

        $user = user();
        $user_id = !empty($user) ? $user->id : 0;

        foreach ($event->document->items as $item) {
            $warehouse_id = InventoryDocumentItem::where('document_id', $event->document->id)->where('document_item_id', $item->id)->value('warehouse_id');
            $inventory_item = InventoryItem::where('warehouse_id', $warehouse_id)->where('item_id', $item->item_id)->first();

            if (empty($inventory_item)) {
                continue;
            }

            if ($operation_type == 'negative') {
                $inventory_item->opening_stock -= (float) $item->quantity;
            } else {
                $inventory_item->opening_stock += (float) $item->quantity;
            }

            $inventory_item->save();

            InventoryHistory::where('type_type', get_class($item))
                ->where('type_id', $item->id)
                ->delete();

            $history_data = [
                'company_id'    => $item->company_id,
                'user_id'       => $user_id,
                'item_id'       => $item->item->id,
                'type_id'       => $item->id,
                'type_type'     => get_class($item),
                'warehouse_id'  => !empty($warehouse_id) ? $warehouse_id : setting('inventory.default.warehouse'),
                'quantity'      => $item->quantity,
            ];

            $this->ajaxDispatch(new CreateHistory($history_data));
        }
    }
}
