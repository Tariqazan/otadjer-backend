<?php

namespace Modules\Estimates\Imports\Sheets;

use App\Abstracts\Import;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Models\EstimateItem as Model;
use App\Http\Requests\Document\DocumentItem as Request;

class EstimateItems extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        if ($this->isEmpty($row, 'estimate_number')) {
            return [];
        }

        $row = parent::map($row);

        $row['document_id'] = (int) Estimate::estimate()->number($row['estimate_number'])->pluck('id')->first();

        if (empty($row['item_id']) && !empty($row['item_name'])) {
            $row['item_id'] = $this->getItemIdFromName($row);

            $row['name'] = $row['item_name'];
        }

        $row['tax'] = (double) $row['tax'];
        $row['tax_id'] = 0;
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
