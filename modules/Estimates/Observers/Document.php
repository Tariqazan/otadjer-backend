<?php

namespace Modules\Estimates\Observers;

use App\Abstracts\Observer;
use Modules\Estimates\Models\Estimate;

class Document extends Observer
{
    public function deleted(Estimate $estimate): void
    {
        $estimate->extra_param()->delete();
    }
}
