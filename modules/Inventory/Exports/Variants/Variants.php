<?php

namespace Modules\Inventory\Exports\Variants;

use Modules\Inventory\Exports\Variants\Sheets\Variants as BaseVariants;
use Modules\Inventory\Exports\Variants\Sheets\VariantValues;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Variants implements WithMultipleSheets
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
            new BaseVariants($this->ids),
            new VariantValues($this->ids),
        ];
    }
}
