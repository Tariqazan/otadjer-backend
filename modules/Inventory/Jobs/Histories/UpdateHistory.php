<?php

namespace Modules\Inventory\Jobs\Histories;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\History;

class UpdateHistory extends Job implements ShouldUpdate
{
    public function handle(): History
    {
        \DB::transaction(function () {
            $this->model->update($this->request->all());
        });

        return $this->model;
    }
}
