<?php

namespace Modules\Inventory\Jobs\Variants;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\VariantValue;

class CreateVariantValue extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): VariantValue
    {
        $this->model = VariantValue::create($this->request->all());

        return $this->model;
    }
}
