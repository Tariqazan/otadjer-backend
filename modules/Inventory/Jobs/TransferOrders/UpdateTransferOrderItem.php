<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use Modules\Inventory\Models\TransferOrderItem;

class UpdateTransferOrderItem extends Job
{
    protected $item;

    protected $transfer_order;

    /**
     * Create a new job instance.
     *
     * @param  $item
     * @param  $transfer_order
     */
    public function __construct($item, $transfer_order)
    {
        $this->item = $item;
        $this->transfer_order = $transfer_order;
    }

    /**
     * Execute the job.
     *
     * @return TransferOrderItem
     */
    public function handle()
    {
        \DB::transaction(function () {
            $transfer_order_items = TransferOrderItem::where('transfer_order_id', $this->transfer_order->id)->delete();

            $this->transfer_order_item = TransferOrderItem::create([
                'company_id'        => company_id(),
                'transfer_order_id' => $this->transfer_order->id,
                'item_id'           => $this->item["item_id"],
                'item_quantity'     => $this->item["item_quantity"],
                'transfer_quantity' => $this->item["transfer_quantity"],
            ]);
        });

        return $this->transfer_order_item;
    }
}
