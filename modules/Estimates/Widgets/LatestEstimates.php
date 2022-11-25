<?php

namespace Modules\Estimates\Widgets;

use App\Abstracts\Widget;
use Modules\Estimates\Models\Estimate;

class LatestEstimates extends Widget
{
    public $default_name = 'estimates::widgets.latest_estimates';

    public function show()
    {
        $estimates = $this->applyFilters(
            Estimate::estimate()->with('category')
                    ->leftJoin('estimates_extra_parameters', 'document_id', '=', 'documents.id')
                    ->orderBy('expire_at', 'desc')
                    ->accrued()->take(5),
            ['date_field' => 'issued_at']
        )->get();

        return $this->view('estimates::widgets.latest_estimates', ['estimates' => $estimates]);
    }
}
