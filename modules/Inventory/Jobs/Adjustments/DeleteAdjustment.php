<?php

namespace Modules\Inventory\Jobs\Adjustments;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History as InventoryHistory;

class DeleteAdjustment extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        \DB::transaction(function () {
            foreach ($this->model->adjustment_items as $item) {
                $inventory_item = InventoryItem::where('warehouse_id', $this->model->warehouse_id)->where('item_id', $item->item_id)->first();
                $inventory_item->update(['opening_stock' => $inventory_item->opening_stock + $item->adjusted_quantity]);
                $item->delete();
            }

            $histories = InventoryHistory::where('type_id', $this->model->id)->where('type_type', get_class($this->model))->delete();

            $this->model->delete();
        });

        return true;
    }
}
