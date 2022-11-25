<?php

namespace Modules\Inventory\Exports\Show\Warehouses\Sheets;

use App\Abstracts\Export;
use Modules\Inventory\Models\History as Model;

class Histories extends Export
{
    public function collection()
    {
        $model = Model::where('warehouse_id', $this->ids)->usingSearchString(request('search'));

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
