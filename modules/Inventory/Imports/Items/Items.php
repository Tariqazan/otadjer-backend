<?php

namespace Modules\Inventory\Imports\Items;

use App\Abstracts\ImportMultipleSheets;
use Modules\Inventory\Imports\Items\Sheets\Items as BaseItems;
use Modules\Inventory\Imports\Items\Sheets\ItemTaxes;
use Modules\Inventory\Imports\Items\Sheets\Warehouses;

class Items extends ImportMultipleSheets
{
    public function sheets(): array
    {
        return [
            'items'         => new BaseItems(),
            'item_taxes'    => new ItemTaxes(),
            'warehouses'    => new Warehouses(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
