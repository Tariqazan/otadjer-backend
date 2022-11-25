<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Estimates\Models\Estimate;

class EstimateType
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['type' => Estimate::TYPE]);
    }
}
