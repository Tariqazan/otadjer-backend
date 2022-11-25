<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Models\Common\Company;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\TransferOrderHistory;

class CreateTransferOrderHistory extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): TransferOrderHistory
    {
        $this->model = TransferOrderHistory::create($this->request->all());

        return $this->model;
    }
}
