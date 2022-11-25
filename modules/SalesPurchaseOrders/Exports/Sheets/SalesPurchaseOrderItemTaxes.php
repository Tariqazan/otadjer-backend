<?php

namespace Modules\SalesPurchaseOrders\Exports\Sheets;

use App\Abstracts\Export;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\ItemTax as PurchaseOrderItemTax;
use Modules\SalesPurchaseOrders\Models\SalesOrder\ItemTax as SalesOrderItemTax;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrderItemTaxes extends Export
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
            $builder = SalesOrderItemTax::sales();
        } else {
            $builder = PurchaseOrderItemTax::purchase();
        }

        $model = $builder->with('document', 'item', 'tax')->usingSearchString(request('search'));

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

        $model->item_name = $model->item->name;
        $model->tax_rate  = $model->tax->rate;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            $this->type === SalesOrder::TYPE ? 'sales_order_number' : 'purchase_order_number',
            'item_name',
            'tax_rate',
            'amount',
        ];
    }

    public function title(): string
    {
        return $this->type === SalesOrder::TYPE ? 'sales_order_item_taxes' : 'purchase_order_item_taxes';
    }
}
