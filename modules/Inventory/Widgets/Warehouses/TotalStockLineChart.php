<?php
namespace Modules\Inventory\Widgets\Warehouses;

use Date;
use App\Traits\DateTime;
use App\Abstracts\Widget;
use App\Traits\Currencies;
use App\Utilities\Chartjs;
use Modules\Inventory\Models\History;
use Modules\Inventory\Models\Warehouse;

class TotalStockLineChart extends Widget
{
    use Currencies, DateTime;

    public $default_name = 'inventory::widgets.stock_line_chart';

    public $default_settings = [
        'width' => 'col-md-12',
    ];

    public function show($warehouse)
    {
        $this->views['header'] = 'inventory::widgets.standard_header';

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

        $colors = [];

        $chart = new Chartjs();
        $chart->type('line')
            ->width(0)
            ->height(300)
            ->options($this->getLineChartOptions(false))
            ->labels(array_values($labels));

        $rand_color = mt_rand(0, 999999);

        $stock = $this->calculateTotals($start, $end, $period, $warehouse);

        $chart->dataset(trans('inventory::widgets.total_stock'), 'line', array_values($stock))
            ->backgroundColor('#6da252')
            ->color('#6da252')
            ->options([
                'borderWidth' => 4,
                'pointStyle' => 'line',
            ])
            ->fill(false);


        return $this->view('inventory::widgets.show_line_chart', [
            'chart' => $chart,
        ]);
    }

    private function calculateTotals($start, $end, $period, $warehouse)
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

        $histories = $this->applyFilters(History::where('warehouse_id', $warehouse->id), ['date_field' => 'created_at'])->get();

        $this->i = null;

        $this->setTotals($totals, $histories, $date_format, $period);

        if ($this->i) {
            for ($i = $this->i ; $i <= $end_date ; $i++) {
                $totals[$i] = $totals[$this->i];
            }
        }

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

                if (substr(Date::parse($history->created_at)->format($date_format), -2) != '01') {
                    $last_mount_quantity = $totals[Date::parse($history->created_at)->addMonths(-1)->format($date_format)];
                }
            }

            if ($totals[$i] == 0) {
                if (isset($history->type->type)) {
                    $operation_type = config('type.operation.' . $history->type->type);

                    if (!$operation_type) {
                        return;
                    }

                    if ($operation_type == 'negative') {
                        $totals[$i] = $last_mount_quantity - $history->quantity;
                    } else {
                        $totals[$i] = $last_mount_quantity + $history->quantity;
                    }

                } else {
                    $totals[$i] = $last_mount_quantity + $history->quantity;
                }
            } else {
                if (isset($history->type->type)) {
                    $operation_type = config('type.operation.' . $history->type->type);

                    if (!$operation_type) {
                        return;
                    }

                    if ($operation_type == 'negative') {
                        $totals[$i] -= $history->quantity;
                    } else {
                        $totals[$i] += $last_mount_quantity + $history->quantity;
                    }

                } else {
                    $totals[$i] += $last_mount_quantity + $history->quantity;
                }
            }

            $last_mount_quantity = 0;

            $this->i = $i;
        }
    }
}
