<?php

namespace Modules\Inventory\Exports\Items;

use Modules\Inventory\Exports\Items\Sheets\Items as CoreItems;
use Modules\Inventory\Exports\Items\Sheets\ItemTaxes;
use Modules\Inventory\Exports\Items\Sheets\Warehouses;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Items implements WithMultipleSheets
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
            new CoreItems($this->ids),
            new ItemTaxes($this->ids),
            new Warehouses($this->ids),
        ];
    }
}
