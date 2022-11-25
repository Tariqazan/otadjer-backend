<?php

namespace Modules\Inventory\Exports\Variants\Sheets;

use App\Abstracts\Export;
use Modules\Inventory\Models\Variant as Model;

class Variants extends Export
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
        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'enabled',
        ];
    }
}
