<?php

namespace Modules\Inventory\Imports\ItemGroups\Sheets;

use App\Abstracts\Import;
use App\Models\Common\Item;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Models\ItemGroupVariantValue as Model;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\VariantValue;
use Modules\Inventory\Http\Requests\ItemGroupVariantAdd as Request;

class ItemGroupVariantValues extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['item_id'] = Item::where('name', $row['item_name'])->value('id');
        $row['item_group_id'] = ItemGroup::where('name', $row['item_group_name'])->value('id');
        $row['item_group_item_id'] = ItemGroupItem::where('item_id', $row['item_id'])->value('id');
        $row['variant_id'] = Variant::where('name', $row['variant_name'])->value('id');

        $variant_value = VariantValue::firstOrCreate([
            'name' => $row['variant_value_name'],
        ], [
            'company_id' => company_id(),
            'variant_id' => $row['variant_id'],
        ])->id;

        $row['variant_value_id'] = $variant_value;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
