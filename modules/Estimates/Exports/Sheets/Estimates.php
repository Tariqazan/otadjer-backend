<?php

namespace Modules\Estimates\Exports\Sheets;

use App\Abstracts\Export;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Modules\Estimates\Models\Estimate as Model;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Estimates extends Export implements WithColumnFormatting
{
    public function collection()
    {
        $model = Model::estimate()->with('category')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array)$this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $model->estimate_number = $model->document_number;
        $model->category_name   = $model->category->name;

        $model->estimated_at = ExcelDate::PHPToExcel($model->issued_at->format('Y-m-d'));
        $model->expire_at    = ExcelDate::PHPToExcel(optional($model->extra_param->expire_at)->format('Y-m-d'));

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'estimate_number',
            'status',
            'estimated_at',
            'expire_at',
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

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }
}
