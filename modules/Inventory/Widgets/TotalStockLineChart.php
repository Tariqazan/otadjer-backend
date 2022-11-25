<?php
namespace Modules\Inventory\Widgets;

use Date;
use App\Traits\DateTime;
use App\Abstracts\Widget;
use App\Traits\Currencies;
use App\Utilities\Chartjs;
use Modules\Inventory\Models\Item;
use App\Models\Document\DocumentItem;
use Modules\Inventory\Models\History;

class TotalStockLineChart extends Widget
{
    use Currencies, DateTime;

    public $default_name = 'inventory::widgets.tracked_items_cash_flow';

    public $default_settings = [
        'width' => 'col-md-12',
    ];

    public $views = [
        'header' => 'partials.widgets.standard_header',
    ];

    public function show()
    {
        $financial_start = $this->getFinancialStart()->format('Y-m-d');

        // check and assign year start
        if (($year_start = Date::today()->startOfYear()->format('Y-m-d')) !== $financial_start) {
            $year_start = $financial_start;
        }

        $start = Date::parse(request('start_date', $year_start));
        $end = Date::parse(request('end_date', Date::parse($year_start)->addYear(1)
                ->subDays(1)
                ->format('Y-m-d')));
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

        $s = clone $start;
        $start_date = $start->format('Y-m');
        $end_date = $end->format('Y-m');

        while ($start_date <= $end_date) {
            $totals[$start_date] = 0;
            $start_date = $s->addMonths(1)->format('Y-m');
        }

        $income = $totals;
        $expense = $totals;
        $incomes = $this->calculateTotals('invoice', $start, $end, $period);
        $expenses = $this->calculateTotals('bill', $start, $end, $period);

        foreach ($incomes as $key => $value) {
            $income[$key] += $value;
        }

        foreach ($expenses as $key => $value) {
            $expense[$key] += $value;
        }

        $chart = new Chartjs();
        $chart->type('line')
            ->width(0)
            ->height(300)
            ->options($this->getLineChartOptions())
            ->labels(array_values($labels));

        $chart->dataset(trans_choice('general.incomes', 1), 'line', array_values($income))
            ->backgroundColor('#328aef')
            ->color('#328aef')
            ->options([
                'borderWidth' => 4,
                'pointStyle' => 'line',
            ])
            ->fill(false);

        $chart->dataset(trans_choice('general.expenses', 2), 'line', array_values($expense))
            ->backgroundColor('#ef3232')
            ->color('#ef3232')
            ->options([
                'borderWidth' => 4,
                'pointStyle' => 'line',
            ])
            ->fill(false);

        return $this->view('inventory::widgets.line_chart', [
            'chart' => $chart,
        ]);
    }

    private function calculateTotals($type, $start, $end, $period)
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

        // $totals[$start_date] = 0;
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

        $document_items = $this->applyFilters(DocumentItem::where('type', $type), ['date_field' => 'created_at'])->get();

        $this->setTotals($totals, $document_items, $date_format, $period);

        return $totals;
    }

    private function setTotals(&$totals, $document_items, $date_format, $period)
    {
        $filter_mount = null;

        foreach ($document_items as $document_item) {
            if ($period == 'month') {
                $i = Date::parse($document_item->created_at)->format($date_format);
            } else {
                $i = Date::parse($document_item->created_at)->quarter;
            }

            if (!isset($totals[$i])) {
                continue;
            }

            $totals[$i] += $this->convertToDefault($document_item->total, $document_item->document->currency_code, $document_item->document->currency_rate);
        }
    }
}
