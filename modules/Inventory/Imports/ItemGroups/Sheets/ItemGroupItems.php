<?php

namespace Modules\Inventory\Imports\ItemGroups\Sheets;

use App\Abstracts\Import;
use App\Models\Common\Item;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\ItemGroupItem as Model;
use Modules\Inventory\Http\Requests\Imports\ItemGroupItem as Request;

class ItemGroupItems extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['item_id'] = Item::where('name', $row['item_name'])->pluck('id')->first();
        $row['item_group_id'] = ItemGroup::where('name', $row['item_group_name'])->pluck('id')->first();

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
