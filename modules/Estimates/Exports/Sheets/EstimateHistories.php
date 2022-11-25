<?php

namespace Modules\Estimates\Exports\Sheets;

use App\Abstracts\Export;
use Modules\Estimates\Models\EstimateHistory as Model;

class EstimateHistories extends Export
{
    public function collection()
    {
        $model = Model::estimate()->with('document')->usingSearchString(request('search'));

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

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'estimate_number',
            'status',
            'notify',
            'description',
        ];
    }
}
