<?php

namespace Modules\Inventory\Exports\ItemGroups\Sheets;

use App\Abstracts\Export;
use App\Models\Common\Item;
use Modules\Inventory\Models\Item as Model;
use Modules\Inventory\Models\Warehouse as InventoryWarehouse;

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
        $model->warehouse_name =  InventoryWarehouse::where('id', $model->warehouse_id)->pluck('name')->first();
        $model->item_name = Item::where('id', $model->item_id)->pluck('name')->first();

        $model->total_stock = $model->opening_stock;
        $model->opening_stock = $model->opening_stock_value;

        if ($model->default_warehouse == 1) {
            $model->default_warehouse = 'true';
        } else {
            $model->default_warehouse = 'false';
        }

        if ($model->returnable == 1) {
            $model->returnable = 'true';
        } else {
            $model->returnable = 'false';
        }

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'item_name',
            'total_stock',
            'opening_stock',
            'reorder_level',
            'warehouse_name',
            'default_warehouse',
            'sku',
            'unit',
            'returnable',
            'barcode'
        ];
    }
}
