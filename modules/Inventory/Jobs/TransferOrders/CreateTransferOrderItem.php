<?php

namespace Modules\Inventory\Jobs\TransferOrders;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\TransferOrderItem;

class CreateTransferOrderItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): TransferOrderItem
    {
        $this->model = TransferOrderItem::create($this->request->all());

        return $this->model;
    }
}
