<?php

namespace Modules\Inventory\Imports\Variants;

use App\Abstracts\ImportMultipleSheets;
use Modules\Inventory\Imports\Variants\Sheets\Variants as BaseVariants;
use Modules\Inventory\Imports\Variants\Sheets\VariantValues;

class Variants extends ImportMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'variants' => new BaseVariants(),
            'variant_values' => new VariantValues(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
