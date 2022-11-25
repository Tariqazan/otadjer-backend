<?php

namespace Modules\Estimates\Widgets;

use App\Abstracts\Widget;
use Modules\Estimates\Models\Estimate;
use Date;

class TotalEstimates extends Widget
{
    public $default_name = 'estimates::widgets.total_estimates';

    public $views = [
        'header' => 'partials.widgets.stats_header',
    ];

    public function show()
    {
        $open = $expired = 0;

        $this->applyFilters(Estimate::estimate()->accrued()->notInvoiced(), ['date_field' => 'issued_at'])->each(
            function ($estimate) use (&$open, &$expired) {
                list($open_tmp, $expired_tmp) = $this->calculateDocumentTotals($estimate);

                $open    += $open_tmp;
                $expired += $expired_tmp;
            }
        );

        $progress = 100;

        if (!empty($open) && !empty($expired)) {
            $progress = ($open * 100) / ($open + $expired);
        }

        $totals = [
            'grand'  => money($open + $expired, setting('default.currency'), true),
            'open'     => money($open, setting('default.currency'), true),
            'expired'  => money($expired, setting('default.currency'), true),
            'progress' => $progress,
        ];

        return $this->view('estimates::widgets.total_estimates', ['totals' => $totals]);
    }

    public function calculateDocumentTotals($model)
    {
        $open = $expired = 0;

        $today = Date::today()->toDateString();

        if ($model->extra_param->expire_at > $today) {
            $open += $model->getAmountConvertedToDefault();
        } else {
            $expired += $model->getAmountConvertedToDefault();
        }

        return [$open, $expired];
    }
}
