<?php

namespace Modules\Inventory\Jobs\Adjustments;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use App\Models\Common\Company;
use Modules\Inventory\Models\Adjustment;
use Modules\Inventory\Events\AdjustmentCreated;
use Modules\Inventory\Jobs\Adjustments\CreateAdjustmentItem;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Models\Item as InventoryItem;

class CreateAdjustment extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): Adjustment
    {
        \DB::transaction(function () {
            $this->model = Adjustment::create($this->request->all());

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
                ];

                $this->dispatch(new CreateHistory($history_data));
            }

            event(new AdjustmentCreated($this->model));
        });

        return $this->model;
    }
}
