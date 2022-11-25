<?php

namespace Modules\CompositeItems\Jobs;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\CompositeItems\Models\Item;

class CreateCompositeItemItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): Item
    {
        $this->model = Item::create($this->request->all());

        return $this->model;
    }
}
