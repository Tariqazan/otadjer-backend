<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Models\Common\Company;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\TransferOrder;
use Modules\Inventory\Models\TransferOrderItem;
use Modules\Inventory\Models\TransferOrderHistory;
use Modules\Inventory\Jobs\TransferOrders\CreateTransferOrderItem;

class UpdateTransferOrder extends Job implements ShouldUpdate
{
    public function handle(): TransferOrder
    {
        \DB::transaction(function () {
            $this->model->update($this->request->all());

            TransferOrderItem::where('transfer_order_id', $this->model->id)->delete();

            foreach ($this->request->items as $item) {
                $transfer_order_item_request = [
                    'company_id'        => company_id(),
                    'transfer_order_id' => $this->model->id,
                    'item_id'           => $item['item_id'],
                    'item_quantity'     => $item['item_quantity'],
                    'transfer_quantity' => $item['transfer_quantity'],
                ];

                $this->dispatch(new CreateTransferOrderItem($transfer_order_item_request));
            }

            $user = user();

            if (empty($user)) {
                $company = Company::find($this->model->company_id);
                $user = $company->users()->first();
            }

            $history = TransferOrderHistory::where('transfer_order_id', $this->model->id)->first();

            $history_request = [
                'created_by'    => $user->id,
                'status'        => 'draft',
            ];

            $this->dispatch(new UpdateTransferOrderHistory($history, $history_request));
        });

        return $this->model;
    }
}
