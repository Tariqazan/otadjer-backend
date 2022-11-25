<?php

namespace Modules\Inventory\Imports\ItemGroups\Sheets;

use App\Abstracts\Import;
use Modules\Inventory\Http\Requests\Imports\ItemGroup as Request;
use Modules\Inventory\Models\ItemGroup as Model;

class ItemGroups extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['category_id'] = $this->getCategoryId($row, 'item');

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
