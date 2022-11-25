<?php

namespace Modules\SalesPurchaseOrders\Imports\Sheets;

use App\Abstracts\Import;
use App\Http\Requests\Document\DocumentItem as Request;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Item as PurchaseOrderItem;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Item as SalesOrderItem;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrderItems extends Import
{
    private $type;

    public function __construct(string $type = SalesOrder::TYPE)
    {
        $this->type = $type;
    }

    public function model(array $row)
    {
        return $this->type === SalesOrder::TYPE ? new SalesOrderItem($row) : new PurchaseOrderItem($row);
    }

    public function map($row): array
    {
        if ($this->type === SalesOrder::TYPE && $this->isEmpty($row, 'sales_order_number')) {
            return [];
        }

        if ($this->type === PurchaseOrder::TYPE && $this->isEmpty($row, 'purchase_order_number')) {
            return [];
        }

        $row = parent::map($row);

        if ($this->type === SalesOrder::TYPE) {
            $row['document_id'] = (int)SalesOrder::sales()
                                                 ->number($row['sales_order_number'])
                                                 ->pluck('id')
                                                 ->first();
        } else {
            $row['document_id'] = (int)PurchaseOrder::purchase()
                                                    ->number($row['purchase_order_number'])
                                                    ->pluck('id')
                                                    ->first();
        }

        if (empty($row['item_id']) && !empty($row['item_name'])) {
            $row['item_id'] = $this->getItemIdFromName($row);

            $row['name'] = $row['item_name'];
        }

        $row['tax']    = (double)$row['tax'];
        $row['tax_id'] = 0;
        $row['type']   = $this->type;

        return $row;
    }

    public function rules(): array
    {
        $rules = (new Request())->rules();

        if ($this->type === SalesOrder::TYPE) {
            $rules['sales_order_number'] = 'required|string';
        } else {
            $rules['purchase_order_number'] = 'required|string';
        }

        unset($rules['document_id']);

        return $rules;
    }
}
