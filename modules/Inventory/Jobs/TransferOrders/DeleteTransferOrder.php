<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;
use Modules\Inventory\Models\History;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Jobs\TransferOrders\DeleteTransferOrderItem;

class DeleteTransferOrder extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        \DB::transaction(function () {
            if ($this->model->status == 'transferred') {
                foreach ($this->model->transfer_order_items as $transfer_order_item) {
                    $destination_inventory_item = InventoryItem::where('warehouse_id', $this->model->destination_warehouse_id)
                                                                ->where('item_id', $transfer_order_item->item_id)
                                                                ->first();

                    $source_inventory_item = InventoryItem::where('warehouse_id', $this->model->source_warehouse_id)
                                                            ->where('item_id', $transfer_order_item->item_id)
                                                            ->first();

                    $destination_quantity = $destination_inventory_item->opening_stock - $transfer_order_item->transfer_quantity;

                    $destination_inventory_item->update(['opening_stock' => $destination_quantity]);

                    if (empty($source_inventory_item)){
                        $source_inventory_item = InventoryItem::create([
                            'company_id' => $destination_inventory_item->company_id,
                            'item_id' => $transfer_order_item->item_id,
                            'opening_stock' => $transfer_order_item->transfer_quantity,
                            'opening_stock_value' => $transfer_order_item->transfer_quantity,
                            'warehouse_id' => $this->model->destination_warehouse_id,
                            'sku' => $destination_inventory_item->sku,
                        ]);
                    } else {
                        $destination_inventory_item = InventoryItem::where('warehouse_id', $this->model->destination_warehouse_id)
                                                                    ->where('item_id', $transfer_order_item->item_id)
                                                                    ->first();

                        $source_quantity = $source_inventory_item->opening_stock + $transfer_order_item->transfer_quantity;

                        $source_inventory_item_updated = $source_inventory_item->update(['opening_stock' => $source_quantity]);
                    }
                }
            }

            foreach ($this->model->transfer_order_items as $item) {
                $this->dispatch(new DeleteTransferOrderItem($item, $this->model));
            }

            History::where('type_type', 'Modules\Inventory\Models\TransferOrder')->where('type_id', $this->model->id)->delete();

            $this->model->delete();
        });
        return true;
    }
}
