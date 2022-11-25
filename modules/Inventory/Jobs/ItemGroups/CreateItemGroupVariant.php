<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\ItemGroupVariant;

class CreateItemGroupVariant extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): ItemGroupVariant
    {
        $this->model = ItemGroupVariant::create($this->request->all());

        return $this->model;
    }
}
