<?php

namespace Modules\Estimates\Imports\Sheets;

use App\Abstracts\Import;
use App\Http\Requests\Document\DocumentItemTax as Request;
use App\Models\Common\Item;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Models\EstimateItem;
use Modules\Estimates\Models\EstimateItemTax as Model;

class EstimateItemTaxes extends Import
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

        if (empty($row['document_item_id']) && !empty($row['item_name'])) {
            $item_id = Item::name($row['item_name'])->pluck('id')->first();
            $row['document_item_id'] = EstimateItem::estimate()->where('item_id', $item_id)->pluck('id')->first();
        }

        $row['tax_id'] = $this->getTaxId($row);

        if (empty($row['name']) && !empty($row['item_name'])) {
            $row['name'] = $row['item_name'];
        }

        $row['amount'] = (double) $row['amount'];

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
