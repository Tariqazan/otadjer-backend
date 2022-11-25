<?php

namespace Modules\SalesPurchaseOrders\Imports\Sheets;

use App\Abstracts\Import;
use App\Http\Requests\Document\Document as Request;
use Illuminate\Support\Str;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SalesPurchaseOrders extends Import
{
    private $type;

    public function __construct(string $type = SalesOrder::TYPE)
    {
        $this->type = $type;
    }

    public function model(array $row)
    {
        return $this->type === SalesOrder::TYPE ? new SalesOrder($row) : new PurchaseOrder($row);
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

        $row['category_id']     = $this->getCategoryId($row, 'income');
        $row['contact_id']      = $this->getContactId($row, 'customer');
        $row['order_number']    = $row['reference_number'];
        $row['document_number'] =
            $this->type === SalesOrder::TYPE ? $row['sales_order_number'] : $row['purchase_order_number'];
        $row['type']            = $this->type;

        return $row;
    }

    public function rules(): array
    {
        $rules = (new Request())->rules();

        if ($this->type === SalesOrder::TYPE) {
            $rules['sales_order_number'] = Str::replaceFirst(
                'unique:documents,NULL',
                'unique:documents,document_number',
                $rules['document_number']
            );
        } else {
            $rules['purchase_order_number'] = Str::replaceFirst(
                'unique:documents,NULL',
                'unique:documents,document_number',
                $rules['document_number']
            );
        }

        unset($rules['document_number'], $rules['type']);

        return $rules;
    }
}
