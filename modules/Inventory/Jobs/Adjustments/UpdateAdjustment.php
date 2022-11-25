<?php

namespace Modules\Inventory\Jobs\Adjustments;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\Adjustment;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History as InventoryHistory;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Jobs\Adjustments\CreateAdjustmentItem;

class UpdateAdjustment extends Job implements ShouldUpdate
{
    public function handle(): Adjustment
    {
        \DB::transaction(function () {
            $this->model->update($this->request->all());

            foreach ($this->model->adjustment_items as $item) {
                $inventory_item = InventoryItem::where('warehouse_id', $this->model->warehouse_id)->where('item_id', $item->item_id)->first();
                $inventory_item->update(['opening_stock' => $inventory_item->opening_stock + $item->adjusted_quantity]);

                $histories = InventoryHistory::where('type_id', $this->model->id)->where('type_type', get_class($this->model))->delete();

                $item->delete();
            }

            foreach ($this->request->items as $item) {
                $inventory_item = InventoryItem::where('warehouse_id', $this->model->warehouse_id)->where('item_id', $item['item_id'])->first();

                $new_quantity = $inventory_item->opening_stock - $item['adjusted_quantity'];

                $inventory_item->update(['opening_stock' => $new_quantity]);

                $adjustment_item_request = [
                    'company_id'        => company_id(),
                    'adjustment_id'     => $this->model->id,
                    'item_id'           => $item['item_id'],
                    'item_quantity'     => $item['item_quantity'],
                    'adjusted_quantity' => $item['adjusted_quantity'],
                ];

                $this->dispatch(new CreateAdjustmentItem($adjustment_item_request));

                $user = user();

                if (empty($user)) {
                    $company = Company::find(company_id());
                    $user = $company->users()->first();
                }

                $history_data = [
                    'company_id'    => company_id(),
                    'user_id'       => $user->id,
                    'item_id'       => $item['item_id'],
                    'type_id'       => $this->model->id,
                    'type_type'     => get_class($this->model),
                    'warehouse_id'  => $this->model->warehouse_id,
                    'quantity'      => $item['adjusted_quantity'],
                    'created_from'  => $this->model->created_from,
                    'created_by'    => $this->model->created_by
                ];

                $this->dispatch(new CreateHistory($history_data));
            }
        });

        return $this->model;
    }
}
