<?php

namespace Modules\Inventory\Exports\Variants\Sheets;

use App\Abstracts\Export;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\VariantValue as Model;

class VariantValues extends Export
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
        $variant_name = Variant::where('id', $model->variant_id)->pluck('name')->first();

        $model->variant_name = $variant_name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'variant_name',
            'name',
        ];
    }
}
