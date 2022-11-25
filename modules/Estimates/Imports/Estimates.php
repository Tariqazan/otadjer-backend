<?php

namespace Modules\Estimates\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Estimates\Imports\Sheets\EstimateHistories;
use Modules\Estimates\Imports\Sheets\EstimateItems;
use Modules\Estimates\Imports\Sheets\EstimateItemTaxes;
use Modules\Estimates\Imports\Sheets\Estimates as Base;
use Modules\Estimates\Imports\Sheets\EstimateTotals;

class Estimates implements WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'estimates'           => new Base(),
            'estimate_items'      => new EstimateItems(),
            'estimate_item_taxes' => new EstimateItemTaxes(),
            'estimate_histories'  => new EstimateHistories(),
            'estimate_totals'     => new EstimateTotals(),
        ];
    }
}
