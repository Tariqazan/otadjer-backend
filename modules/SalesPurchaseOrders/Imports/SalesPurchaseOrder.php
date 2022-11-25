<?php

namespace Modules\SalesPurchaseOrders\Imports;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\SalesPurchaseOrders\Imports\Sheets\SalesPurchaseOrderHistories;
use Modules\SalesPurchaseOrders\Imports\Sheets\SalesPurchaseOrderItems;
use Modules\SalesPurchaseOrders\Imports\Sheets\SalesPurchaseOrderItemTaxes;
use Modules\SalesPurchaseOrders\Imports\Sheets\SalesPurchaseOrderTotals;
use Modules\SalesPurchaseOrders\Imports\Sheets\SalesPurchaseOrders as Base;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrder implements WithMultipleSheets
{
    use Importable;

    private $type;

    public function __construct(string $type = SalesOrder::TYPE)
    {
        $this->type = $type;
    }

    public function sheets(string $type = SalesOrder::TYPE): array
    {
        $sheetNamePrefix = Str::replaceFirst('-', '_', $this->type);

        return [
            Str::plural($sheetNamePrefix)    => new Base($this->type),
            $sheetNamePrefix . '_items'      => new SalesPurchaseOrderItems($this->type),
            $sheetNamePrefix . '_item_taxes' => new SalesPurchaseOrderItemTaxes($this->type),
            $sheetNamePrefix . '_histories'  => new SalesPurchaseOrderHistories($this->type),
            $sheetNamePrefix . '_totals'     => new SalesPurchaseOrderTotals($this->type),
        ];
    }
}
