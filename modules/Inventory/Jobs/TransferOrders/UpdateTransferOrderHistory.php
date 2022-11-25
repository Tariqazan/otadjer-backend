<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\TransferOrderHistory;

class UpdateTransferOrderHistory extends Job implements ShouldUpdate
{
    public function handle(): TransferOrderHistory
    {
        $this->model->update($this->request->all());

        return $this->model;
    }
}
