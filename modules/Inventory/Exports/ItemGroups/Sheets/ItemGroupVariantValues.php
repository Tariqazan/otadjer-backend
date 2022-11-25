<?php

namespace Modules\Inventory\Exports\ItemGroups\Sheets;

use App\Abstracts\Export;
use App\Models\Common\Item;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\ItemGroupVariantValue as Model;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\VariantValue;

class ItemGroupVariantValues extends Export
{
    public function collection()
    {
        $model = Model::usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $item_name = Item::where('id', $model->item_id)->value('name');
        $item_group_name = ItemGroup::where('id', $model->item_group_id)->value('name');
        $variant_name = Variant::where('id', $model->variant_id)->value('name');
        $variant_value_name = VariantValue::where('id', $model->variant_value_id)->value('name');

        $model->item_name = $item_name;
        $model->variant_name = $variant_name;
        $model->variant_value_name = $variant_value_name;
        $model->item_group_name = $item_group_name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'item_name',
            'variant_name',
            'variant_value_name',
            'item_group_name',
        ];
    }
}
