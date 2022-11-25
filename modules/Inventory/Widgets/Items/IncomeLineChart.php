<?php

namespace Modules\Inventory\Widgets\Items;

use Date;
use App\Traits\DateTime;
use App\Abstracts\Widget;
use App\Traits\Currencies;
use App\Utilities\Chartjs;
use Modules\Inventory\Models\History;

class IncomeLineChart extends Widget
{
    use Currencies, DateTime;

    public $default_name = 'inventory::widgets.sales_quantity_by_warehouse';

    public $default_settings = [
        'width' => 'col-md-12',
    ];

    public function show($item = null)
    {
        if (!$item->inventory()->first()) {
            return;
        }

        $this->views['header'] = 'inventory::widgets.standard_header';

        $financial_start = $this->getFinancialStart()->format('Y-m-d');

        // check and assign year start
        if (($year_start = Date::today()->startOfYear()->format('Y-m-d')) !== $financial_start) {
            $year_start = $financial_start;
        }

        $start = Date::parse(request('start_date', $year_start));
        $end = Date::parse(request('end_date', Date::parse($year_start)->addYear(1)->subDays(1)->format('Y-m-d')));
        $period = request('period', 'month');
        $range = request('range', 'custom');

        $start_month = $start->month;
        $end_month = $end->month;

        // Monthly
        $labels = [];

        $s = clone $start;

        if ($range == 'last_12_months') {
            $end_month = 12;
            $start_month = 0;
        } elseif ($range == 'custom') {
            $end_month = $end->diffInMonths($start);
            $start_month = 0;
        }

        for ($j = $end_month; $j >= $start_month; $j--) {
            $labels[$end_month - $j] = $s->format('M Y');

            if ($period == 'month') {
                $s->addMonth();
            } else {
                $s->addMonths(3);
                $j -= 2;
            }
        }

        $colors = [];

        $chart = new Chartjs();
        $chart->type('line')
            ->width(0)
            ->height(300)
            ->options($this->getLineChartOptions(false))
            ->labels(array_values($labels));

        foreach ($item->inventory()->get() as $inventory_item) {
            if (empty($inventory_item->warehouse)) {
                continue;
            }

            $rand_color = mt_rand(0, 999999);
            $colors += [$inventory_item->warehouse->name => $rand_color];

            $stock = $this->calculateTotals($start, $end, $period, $inventory_item);

            $chart->dataset($inventory_item->warehouse->name, 'line', array_values($stock))
                ->backgroundColor('#'. $colors[$inventory_item->warehouse->name])
                ->color('#'. $colors[$inventory_item->warehouse->name])
                ->options([
                    'borderWidth' => 4,
                    'pointStyle' => 'line',
                ])
                ->fill(false);
        }

        return $this->view('inventory::widgets.show_line_chart', [
            'chart' => $chart,
        ]);
    }

    private function calculateTotals($start, $end, $period, $inventory_item)
    {
        $totals = [];

        $date_format = 'Y-m';

        if ($period == 'month') {
            $n = 1;
            $start_date = $start->format($date_format);
            $end_date = $end->format($date_format);
            $next_date = $start_date;
        } else {
            $n = 3;
            $start_date = $start->quarter;
            $end_date = $end->quarter;
            $next_date = $start_date;
        }

        $s = clone $start;

        while ($next_date <= $end_date) {
            $totals[$next_date] = 0;

            if ($period == 'month') {
                $next_date = $s->addMonths($n)->format($date_format);
            } else {
                if (isset($totals[4])) {
                    break;
                }

                $next_date = $s->addMonths($n)->quarter;
            }
        }

        $histories = $this->applyFilters(
            History::where('warehouse_id', $inventory_item->warehouse_id)
                   ->where('item_id', $inventory_item->item_id)
                   ->where('type_type', 'App\Models\Document\DocumentItem'),
                   [
                       'date_field' => 'created_at'
                   ])->get();

        $this->setTotals($totals, $histories, $date_format, $period);

        return $totals;
    }

    private function setTotals(&$totals, $histories, $date_format, $period)
    {
        $filter_mount = null;
        $last_mount_quantity = 0;

        foreach ($histories as $history) {
            if ($period == 'month') {
                $i = Date::parse($history->created_at)->format($date_format);
            } else {
                $i = Date::parse($history->created_at)->quarter;
            }

            if (!isset($totals[$i])) {
                continue;
            }

            if ($filter_mount != $i) {
                $filter_mount = $i;

                if (isset($totals[Date::parse($history->created_at)->addMonths(-1)->format($date_format)])) {
                    $last_mount_quantity = $totals[Date::parse($history->created_at)->addMonths(-1)->format($date_format)];
                }
            }

            $document_item = $history->document_item;

            if ($document_item && $document_item->type == 'invoice') {
                if ($totals[$i] == 0) {
                    $totals[$i] = $last_mount_quantity + $history->quantity;
                } else {
                    $totals[$i] += $history->quantity;
                }
            }

            $last_mount_quantity = 0;
        }
    }
}
