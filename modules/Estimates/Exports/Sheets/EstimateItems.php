<?php

namespace Modules\Estimates\Exports\Sheets;

use App\Abstracts\Export;
use Modules\Estimates\Models\EstimateItem as Model;

class EstimateItems extends Export
{
    public function collection()
    {
        $model = Model::estimate()->with('document', 'item')->usingSearchString(request('search'));

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

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'estimate_number',
            'item_name',
            'quantity',
            'price',
            'total',
            'tax',
        ];
    }
}
