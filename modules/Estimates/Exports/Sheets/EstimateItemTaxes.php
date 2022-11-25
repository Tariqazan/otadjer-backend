<?php

namespace Modules\Estimates\Exports\Sheets;

use App\Abstracts\Export;
use Modules\Estimates\Models\EstimateItemTax as Model;

class EstimateItemTaxes extends Export
{
    public function collection()
    {
        $model = Model::estimate()->with('document', 'item', 'tax')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('document_id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $estimate = $model->document;

        if (empty($estimate)) {
            return [];
        }

        $model->estimate_number = $estimate->document_number;
        $model->item_name = $model->item->name;
        $model->tax_rate = $model->tax->rate;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'estimate_number',
            'item_name',
            'tax_rate',
            'amount',
        ];
    }
}
