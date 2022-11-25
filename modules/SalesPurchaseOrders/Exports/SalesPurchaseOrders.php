<?php

namespace Modules\SalesPurchaseOrders\Exports;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\SalesPurchaseOrders\Exports\Sheets\SalesPurchaseOrderHistories;
use Modules\SalesPurchaseOrders\Exports\Sheets\SalesPurchaseOrderItems;
use Modules\SalesPurchaseOrders\Exports\Sheets\SalesPurchaseOrderItemTaxes;
use Modules\SalesPurchaseOrders\Exports\Sheets\SalesPurchaseOrders as Base;
use Modules\SalesPurchaseOrders\Exports\Sheets\SalesPurchaseOrderTotals;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrders implements WithMultipleSheets
{
    use Exportable;

    private $ids;
    private $type;

    public function __construct($ids = null, string $type = SalesOrder::TYPE)
    {
        $this->ids  = $ids;
        $this->type = $type;
    }

    public function sheets(): array
    {
        $sheetNamePrefix = Str::replaceFirst('-', '_', $this->type);

        return [
            Str::plural($sheetNamePrefix)    => new Base($this->ids, $this->type),
            $sheetNamePrefix . '_items'      => new SalesPurchaseOrderItems($this->ids, $this->type),
            $sheetNamePrefix . '_item_taxes' => new SalesPurchaseOrderItemTaxes($this->ids, $this->type),
            $sheetNamePrefix . '_histories'  => new SalesPurchaseOrderHistories($this->ids, $this->type),
            $sheetNamePrefix . '_totals'     => new SalesPurchaseOrderTotals($this->ids, $this->type),
        ];
    }
}
