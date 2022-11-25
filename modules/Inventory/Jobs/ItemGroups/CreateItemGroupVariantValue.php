<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\ItemGroupVariantValue;

class CreateItemGroupVariantValue extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): ItemGroupVariantValue
    {
        $this->model = ItemGroupVariantValue::create($this->request->all());

        return $this->model;
    }
}
