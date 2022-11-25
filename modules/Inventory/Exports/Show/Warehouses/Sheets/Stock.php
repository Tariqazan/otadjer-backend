<?php

namespace Modules\Inventory\Exports\Show\Warehouses\Sheets;

use App\Abstracts\Export;
use Modules\Inventory\Models\Item as Model;

class Stock extends Export
{
    public function collection()
    {
        $model = Model::where('warehouse_id', $this->ids)->usingSearchString(request('search'));

        return $model->cursor();
    }

    public function map($model): array
    {
        $model->name = $model->item->name;
        $model->category = $model->item->category->name;
        $model->quantity = $model->item->quantity;
        $model->sale_price = $model->item->sale_price;
        $model->purchase_price = $model->item->purchase_price;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'category',
            'quantity',
            'sale_price',
            'purchase_price',
        ];
    }
}
