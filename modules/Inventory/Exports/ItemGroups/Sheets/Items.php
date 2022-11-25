<?php

namespace Modules\Inventory\Exports\ItemGroups\Sheets;

use App\Abstracts\Export;
use App\Models\Common\Item as Model;
use Modules\Inventory\Models\ItemGroupItem;

class Items extends Export
{
    public function collection()
    {
        $model = Model::with('category')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $group_item = ItemGroupItem::where('item_id', $model->id)->first();

        if (empty($group_item)) {
            return [];
        }

        $model->category_name = $model->category->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'description',
            'sale_price',
            'purchase_price',
            'category_name',
            'enabled',
        ];
    }
}
