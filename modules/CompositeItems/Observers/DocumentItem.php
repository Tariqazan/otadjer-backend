<?php

namespace Modules\CompositeItems\Observers;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Abstracts\Observer;
use App\Models\Common\Company;
use Modules\Inventory\Models\History;
use Modules\CompositeItems\Models\CompositeItem;
use Modules\Inventory\Models\Item as InventoryItem;
use App\Models\Document\DocumentItem as DocumentItemModel;

class DocumentItem extends Observer
{
    use Modules, Jobs;

    /**
     * Listen to the deleted event.
     *
     * @param  DocumentItemModel $document_item
     *
     * @return void
     */
    public function deleted(DocumentItemModel $document_item)
    {
        if (! $this->moduleIsEnabled('composite-items') && ! $this->moduleIsEnabled('inventory')) {
            return;
        }

        $item = $document_item->item;

        if (! $item) {
            return;
        }

        $composite_item = CompositeItem::canTrack()->where('item_id', $item->item->id)->first();

        if (! $composite_item) {
            return;
        }

        $operation_type = config('type.operation.' . $document_item->type);

        if (! $operation_type ||
            $document_item->document->status == 'draft' ||
            $document_item->document->status == 'cancelled') {
            return;
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

            History::where('type_type', get_class($item))
                ->where('type_id', $update_item->id)
                ->where('item_id', $inventory_item->item->id)
                ->where('warehouse_id', $comp_item_item->warehouse_id)
                ->delete();
    }
}
