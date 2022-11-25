<?php

namespace Modules\CompositeItems\Jobs;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\CompositeItems\Models\CompositeItem;

class UpdateCompositeItem extends Job implements ShouldUpdate
{
    public function handle(): CompositeItem
    {
        \DB::transaction(function () {
            $this->model->update($this->request->all());
        });

        return $this->model;
    }
}
