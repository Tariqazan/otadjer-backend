<?php

namespace Modules\Estimates\Imports\Sheets;

use App\Abstracts\Import;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Models\EstimateHistory as Model;
use App\Http\Requests\Document\DocumentHistory as Request;

class EstimateHistories extends Import
{
    public function model(array $row)
    {
        // @todo remove after 3.2 release
        if ($row['estimate_number'] == $this->empty_field) {
            return null;
        }

        return new Model($row);
    }

    public function map($row): array
    {
        if ($this->isEmpty($row, 'estimate_number')) {
            return [];
        }

        $row = parent::map($row);

        $row['document_id'] = (int) Estimate::estimate()->number($row['estimate_number'])->pluck('id')->first();

        $row['notify'] = (int) $row['notify'];

        $row['type'] = Estimate::TYPE;

        return $row;
    }

    public function rules(): array
    {
        $rules = (new Request())->rules();

        $rules['estimate_number'] = 'required|string';
        unset($rules['document_id']);

        return $rules;
    }
}
