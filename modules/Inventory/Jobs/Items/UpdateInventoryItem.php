<?php

namespace Modules\Inventory\Jobs\Items;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\Item as InventoryItem;

class UpdateInventoryItem extends Job implements ShouldUpdate
{
    public function handle(): InventoryItem
    {
        $this->model->update($this->request->all());

        return $this->model;
    }
}
