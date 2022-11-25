<?php

namespace Modules\Inventory\Exports\ItemGroups\Sheets;

use App\Abstracts\Export;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\ItemGroupVariant as Model;

class ItemGroupVariants extends Export
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
        $item_group_name = ItemGroup::where('id', $model->item_group_id)->pluck('name')->first();
        $variant_name = Variant::where('id', $model->variant_id)->pluck('name')->first();

        $model->item_group_name =  $item_group_name;
        $model->variant_name = $variant_name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'item_group_name',
            'variant_name',
        ];
    }
}
