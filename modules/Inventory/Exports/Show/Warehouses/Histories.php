<?php

namespace Modules\Inventory\Exports\Show\Warehouses;

use App\Abstracts\Export;
use Modules\Inventory\Models\History as Model;

class Histories extends Export
{
    public function collection()
    {
        $model = Model::where('warehouse_id', request()->segment(4))->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $model->action = $model->action_text;
        $model->item_name = $model->item->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'action',
            'action_type',
            'item_name',
            'quantity'
        ];
    }
}
