<?php

namespace Modules\Inventory\Jobs\Adjustments;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\AdjustmentItem;

class CreateAdjustmentItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): AdjustmentItem
    {
        $this->model = AdjustmentItem::create($this->request->all());

        return $this->model;
    }
}
