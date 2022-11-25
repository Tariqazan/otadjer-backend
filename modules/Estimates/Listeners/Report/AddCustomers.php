<?php

namespace Modules\Estimates\Listeners\Report;

use App\Listeners\Report\AddCustomers as Listener;
use Modules\Estimates\Reports\EstimateSummary;

class AddCustomers extends Listener
{
    protected $classes = [
        EstimateSummary::class
    ];
}
