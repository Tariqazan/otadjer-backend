<?php

namespace Modules\Inventory\Jobs\Histories;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\History;

class CreateHistory extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): History
    {
        \DB::transaction(function () {
            $this->model = History::create($this->request->all());
        });

        return $this->model;
    }
}
