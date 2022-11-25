<?php

namespace Modules\Inventory\Exports\ItemGroups;

use Modules\Inventory\Exports\ItemGroups\Sheets\Items;
use Modules\Inventory\Exports\ItemGroups\Sheets\Warehouses;
use Modules\Inventory\Exports\ItemGroups\Sheets\ItemGroups as BaseItemGroups;
use Modules\Inventory\Exports\ItemGroups\Sheets\ItemGroupVariants;
use Modules\Inventory\Exports\ItemGroups\Sheets\ItemGroupVariantValues;
use Modules\Inventory\Exports\ItemGroups\Sheets\ItemGroupItems;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ItemGroups implements WithMultipleSheets
{
    use Exportable;

    public $ids;

    public function __construct($ids = null)
    {
        $this->ids = $ids;
    }

    public function sheets(): array
    {
        return [
            new Items($this->ids),
            new Warehouses($this->ids),
            new BaseItemGroups($this->ids),
            new ItemGroupItems($this->ids),
            new ItemGroupVariants($this->ids),
            new ItemGroupVariantValues($this->ids),
        ];
    }
}
