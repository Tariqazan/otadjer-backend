<?php

namespace Modules\SalesPurchaseOrders\Exports\Sheets;

use App\Abstracts\Export;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Total as PurchaseOrderTotal;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Total as SalesOrderTotal;

class SalesPurchaseOrderTotals extends Export
{
    private $type;

    public function __construct($ids = null, string $type = SalesOrder::TYPE)
    {
        parent::__construct($ids);

        $this->type = $type;
    }

    public function collection()
    {
        if ($this->type === SalesOrder::TYPE) {
            $builder = SalesOrderTotal::sales();
        } else {
            $builder = PurchaseOrderTotal::purchase();
        }

        $model = $builder->with('document')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('document_id', (array)$this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $document = $model->document;

        if (empty($document)) {
            return [];
        }

        if ($this->type === SalesOrder::TYPE) {
            $model->sales_order_number = $document->document_number;
        } else {
            $model->purchase_order_number = $document->document_number;
        }

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            $this->type === SalesOrder::TYPE ? 'sales_order_number' : 'purchase_order_number',
            'code',
            'name',
            'amount',
            'sort_order',
        ];
    }

    public function title(): string
    {
        return $this->type === SalesOrder::TYPE ? 'sales_order_totals' : 'purchase_order_totals';
    }
}
