<?php

namespace Modules\Inventory\Imports\Variants\Sheets;

use App\Abstracts\Import;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Http\Requests\Imports\VariantValue as Request;
use Modules\Inventory\Models\VariantValue as Model;

class VariantValues extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row['variant_id'] = Variant::where('name', $row['variant_name'])->pluck('id')->first();

        $row = parent::map($row);

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
