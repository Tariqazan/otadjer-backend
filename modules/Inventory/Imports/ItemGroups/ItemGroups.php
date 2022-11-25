<?php

namespace Modules\Inventory\Imports\ItemGroups;

use App\Abstracts\ImportMultipleSheets;
use Modules\Inventory\Imports\ItemGroups\Sheets\Items;
use Modules\Inventory\Imports\ItemGroups\Sheets\Warehouses;
use Modules\Inventory\Imports\ItemGroups\Sheets\ItemGroupItems;
use Modules\Inventory\Imports\ItemGroups\Sheets\ItemGroupVariants;
use Modules\Inventory\Imports\ItemGroups\Sheets\ItemGroupVariantValues;
use Modules\Inventory\Imports\ItemGroups\Sheets\ItemGroups as BaseItemGroups;

class ItemGroups extends ImportMultipleSheets
{
    public function sheets(): array
    {
        return [
            'items'                     => new Items(),
            'warehouses'                => new Warehouses(),
            'item_groups'               => new BaseItemGroups(),
            'item_group_items'          => new ItemGroupItems(),
            'item_group_variants'       => new ItemGroupVariants(),
            'item_group_variant_values' => new ItemGroupVariantValues(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
