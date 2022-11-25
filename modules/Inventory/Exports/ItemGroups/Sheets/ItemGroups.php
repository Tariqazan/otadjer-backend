<?php

namespace Modules\Inventory\Exports\ItemGroups\Sheets;

use App\Abstracts\Export;
use App\Models\Setting\Category;
use Modules\Inventory\Models\ItemGroup as Model;

class ItemGroups extends Export
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
        $category = Category::where('id', $model->category_id)->first();

        if(!empty($category)){
            $model->category_name = $category->name;
        }

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'description',
            'category_name',
            'enabled'
        ];
    }
}
