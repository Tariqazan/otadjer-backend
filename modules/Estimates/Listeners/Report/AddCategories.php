<?php

namespace Modules\Estimates\Listeners\Report;

use App\Listeners\Report\AddIncomeCategories as Listener;
use Modules\Estimates\Reports\EstimateSummary;

class AddCategories extends Listener
{
    protected $classes = [
        EstimateSummary::class,
    ];
}
