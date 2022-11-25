<?php

namespace Modules\CompositeItems\Observers;

use App\Traits\Jobs;
use App\Traits\Modules;
use App\Abstracts\Observer;
use App\Models\Common\Company;
use Modules\Inventory\Models\History;
use App\Models\Document\Document as Model;
use Modules\CompositeItems\Models\CompositeItem;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\Item as InventoryItem;

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
        if (!$this->moduleIsEnabled('composite-items') && !$this->moduleIsEnabled('inventory')) {
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


        $status = ['paid', 'sent', 'received'];

        if (in_array($document->status, $status)) {
            foreach ($update_document->items as $key => $update_item) {
                $composite_item = CompositeItem::canTrack()->where('item_id', $update_item->item->id)->first();

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
    
                    History::where('type_type', get_class($item))
                        ->where('type_id', $update_item->id)
                        ->where('item_id', $inventory_item->item->id)
                        ->where('warehouse_id', $comp_item_item->warehouse_id)
                        ->delete();
    
                    $history_data = [
                        'company_id'    => $update_item->company_id,
                        'user_id'       => $user_id,
                        'item_id'       => $inventory_item->item->id,
                        'type_id'       => $update_item->id,
                        'type_type'     => get_class($item),
                        'warehouse_id'  => $comp_item_item->warehouse_id ?? setting('inventory.default.warehouse'),
                        'quantity'      => $quantity,
                    ];
    
                    $this->ajaxDispatch(new CreateHistory($history_data));
                }
           }
        }
    }
}
