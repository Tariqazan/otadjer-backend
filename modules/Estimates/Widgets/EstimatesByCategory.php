<?php

namespace Modules\Estimates\Widgets;

use App\Abstracts\Widget;
use App\Models\Setting\Category;

class EstimatesByCategory extends Widget
{
    public $default_name = 'estimates::widgets.estimates_by_category';

    public $default_settings = [
        'width' => 'col-md-6',
    ];

    public function show()
    {
        Category::with('estimates')->type('income')->each(
            function ($category) {
                $amount = 0;

                $this->applyFilters($category->estimates()->accrued(), ['date_field' => 'issued_at'])->each(
                    function ($transaction) use (&$amount) {
                        $amount += $transaction->getAmountConvertedToDefault();
                    }
                );

                $this->addMoneyToDonut($category->color, $amount, $category->name);
            }
        );

        $chart = $this->getDonutChart(
            setting('estimates.estimate.name', trans_choice('estimates::general.estimates', 1)),
            0,
            160,
            6
        );

        return $this->view('widgets.donut_chart', ['chart' => $chart]);
    }
}
