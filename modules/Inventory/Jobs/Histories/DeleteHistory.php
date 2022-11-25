<?php

namespace Modules\Inventory\Jobs\Histories;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;

class DeleteHistory extends Job implements ShouldDelete
{
    public function handle()
    {
        \DB::transaction(function () {
            $this->model->delete();
        });

        return true;
    }
}
