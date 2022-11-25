<?php

namespace Modules\Estimates\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Estimates\Exports\Sheets\EstimateHistories;
use Modules\Estimates\Exports\Sheets\EstimateItems;
use Modules\Estimates\Exports\Sheets\EstimateItemTaxes;
use Modules\Estimates\Exports\Sheets\Estimates as Base;
use Modules\Estimates\Exports\Sheets\EstimateTotals;

class Estimates implements WithMultipleSheets
{
    use Exportable;

    public $ids;

    public function __construct($ids = null)
    {
        $this->ids = $ids;
    }

    public function sheets(): array
    {
        return [
            'estimates'           => new Base($this->ids),
            'estimate_items'      => new EstimateItems($this->ids),
            'estimate_item_taxes' => new EstimateItemTaxes($this->ids),
            'estimate_histories'  => new EstimateHistories($this->ids),
            'estimate_totals'     => new EstimateTotals($this->ids),
        ];
    }
}
