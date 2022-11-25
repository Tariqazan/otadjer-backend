<?php

namespace Modules\CompositeItems\Jobs;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\CompositeItems\Models\Item;
use Modules\CompositeItems\Models\CompositeItem;
use App\Jobs\Common\UpdateItem as CoreUpdateItem;

class UpdateItem extends Job implements ShouldUpdate
{
    public function handle()
    {
        \DB::transaction(function () {
            $this->model = $this->dispatch(new CoreUpdateItem($this->model, $this->request));

            $composite_item = CompositeItem::where('item_id', $this->model->id)->first();

            if (isset($this->request->returnable) && $this->request->returnable == 'true') {
                $returnable = 1;
            } else {
                $returnable = 0;
            }
    
            if (isset($this->request->track_inventory) && $this->request->track_inventory == 'true') {
                $track_inventory = 1;
            } else {
                $track_inventory = 0;
            }

            $composite_item_request = [
                'company_id'        => $this->model->company_id,
                'item_id'           => $this->model->id,
                'sku'               => $this->request->sku ?? null,
                'unit'              => $this->request->unit ?? null,
                'returnable'        => $returnable ?? null,
                'barcode'           => $this->request->barcode ?? null,
                'track_inventory'   => $track_inventory,
            ];

            $composite_item = $this->dispatch(new UpdateCompositeItem($composite_item, $composite_item_request));

            Item::where('composite_item_id', $composite_item->id)->delete();
            
            foreach ($this->request->items as $item) {
                $composite_item_item_request = [
                    'company_id'        => $this->model->company_id,
                    'item_id'           => $item['item_id'],
                    'quantity'          => $item['quantity'],
                    'composite_item_id' => $composite_item->id,
                    'warehouse_id'      => $item['warehouse_id'] ?? null,
                ];
    
                $this->dispatch(new CreateCompositeItemItem($composite_item_item_request));
            }
        });

        return $this->model;
    }
}
