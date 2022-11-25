<?php

namespace Modules\Inventory\Imports\ItemGroups\Sheets;

use App\Abstracts\Import;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Http\Requests\ItemGroupVariantAdd as Request;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\ItemGroupVariant as Model;

class ItemGroupVariants extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['item_group_id'] = ItemGroup::where('name', $row['item_group_name'])->pluck('id')->first();

        $variant = Variant::firstOrCreate([
            'name'              => $row['variant_name'],
        ], [
            'company_id'        => company_id(),
            'enabled'           => 1,
        ])->id;

        $row['variant_id'] = $variant;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
