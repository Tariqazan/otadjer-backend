<?php

namespace Modules\SalesPurchaseOrders\Imports\Sheets;

use App\Abstracts\Import;
use App\Http\Requests\Document\DocumentItemTax as Request;
use App\Models\Common\Item;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Item as PurchaseOrderItem;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\ItemTax as PurchaseOrderItemTax;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Item as SalesOrderItem;
use Modules\SalesPurchaseOrders\Models\SalesOrder\ItemTax as SalesOrderItemTax;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrderItemTaxes extends Import
{
    private $type;

    public function __construct(string $type = SalesOrder::TYPE)
    {
        $this->type = $type;
    }

    public function model(array $row)
    {
        // @todo remove after 3.2 release
        if ($this->type === SalesOrder::TYPE && $row['sales_order_number'] == $this->empty_field) {
            return null;
        }

        if ($this->type === PurchaseOrder::TYPE && $row['purchase_order_number'] == $this->empty_field) {
            return null;
        }

        return $this->type === SalesOrder::TYPE ? new SalesOrderItemTax($row) : new PurchaseOrderItemTax($row);
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

        if (empty($row['estimate_item_id']) && !empty($row['item_name'])) {
            $item_id = Item::name($row['item_name'])->pluck('id')->first();

            if ($this->type === SalesOrder::TYPE) {
                $row['document_item_id'] = (int)SalesOrderItem::sales()
                                                              ->where('item_id', $item_id)
                                                              ->pluck('id')
                                                              ->first();
            } else {
                $row['document_item_id'] = (int)PurchaseOrderItem::purchase()
                                                                 ->where('item_id', $item_id)
                                                                 ->pluck('id')
                                                                 ->first();
            }
        }

        $row['tax_id'] = $this->getTaxId($row);

        if (empty($row['name']) && !empty($row['item_name'])) {
            $row['name'] = $row['item_name'];
        }

        $row['amount'] = (double)$row['amount'];

        $row['type'] = $this->type;

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
