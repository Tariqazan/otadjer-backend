<?php

namespace Modules\SalesPurchaseOrders\Exports\Sheets;

use App\Abstracts\Export;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SalesPurchaseOrders extends Export implements WithColumnFormatting
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
            $builder = SalesOrder::sales();
        } else {
            $builder = PurchaseOrder::purchase();
        }

        $model = $builder->with('category')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array)$this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $model->category_name = $model->category->name;

        if ($this->type === SalesOrder::TYPE) {
            $model->sales_order_number = $model->document_number;
        } else {
            $model->purchase_order_number = $model->document_number;
        }

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            $this->type === SalesOrder::TYPE ? 'sales_order_number' : 'purchase_order_number',
            'reference_number',
            'status',
            'issued_at',
            'due_at',
            'amount',
            'currency_code',
            'currency_rate',
            'category_name',
            'contact_name',
            'contact_email',
            'contact_tax_number',
            'contact_phone',
            'contact_address',
            'notes',
            'footer',
        ];
    }

    public function title(): string
    {
        return $this->type === SalesOrder::TYPE ? 'sales_orders' : 'purchase_orders';
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'E' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }
}
