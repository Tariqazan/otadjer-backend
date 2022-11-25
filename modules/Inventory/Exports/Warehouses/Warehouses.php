<?php

namespace Modules\Inventory\Exports\Warehouses;

use App\Abstracts\Export;
use Modules\Inventory\Models\Warehouse as Model;

class Warehouses extends Export
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
            'email',
            'phone',
            'address',
            'enabled',
        ];
    }
}
