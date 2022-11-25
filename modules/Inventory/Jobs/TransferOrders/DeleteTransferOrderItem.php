<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;

class DeleteTransferOrderItem extends Job implements ShouldDelete
{
    public function handle()
    {
        $this->model->delete();

        return true;
    }
}
