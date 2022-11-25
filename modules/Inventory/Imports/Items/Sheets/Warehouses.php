<?php

namespace Modules\Inventory\Imports\Items\Sheets;

use App\Abstracts\Import;
use App\Models\Common\Item;
use Modules\Inventory\Http\Requests\Item as Request;
use Modules\Inventory\Models\Item as Model;
use Modules\Inventory\Models\Warehouse as InventoryWarehouse;
use Modules\Inventory\Traits\Barcode;

class Warehouses extends Import
{
    use Barcode;

    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        if (setting('inventory.reorder_level_notification') == 1) {
            setting()->set('inventory.reorder_level_notification', 0);
            setting()->save();
        }

        $row = parent::map($row);

        $item = Item::where('name', $row['item_name'])->first();

        $row['item_id'] = (int) $item->id;

        if ($this->isEmpty($row, 'item_id')) {
            return [];
        }

        if ($row['warehouse_name'] == null){
            $row['warehouse_id'] = setting('inventory.default_warehouse');
        } else {
            $warehouse = InventoryWarehouse::firstOrCreate([
                'name'              => $row['warehouse_name'],
            ], [
                'company_id'        => company_id(),
                'enabled'           => 1,
            ])->id;

            $row['warehouse_id'] = $warehouse;
        }

        if ($row['default_warehouse'] == 'true'){
            $row['default_warehouse'] = 1;
        } else {
            $row['default_warehouse'] = 0;
        }

        if ($row['returnable'] == 'true'){
            $row['returnable'] = 1;
        } else {
            $row['returnable'] = 0;
        }

        $row['sku'] = (string) $row['sku'];

        $row['opening_stock_value'] = $row['opening_stock'];
        $row['opening_stock'] = $row['total_stock'];

        $setting_units = json_decode(setting('inventory.units'), true);

        if (in_array($row['unit'], $setting_units) != true) {
            $setting_units[] = $row['unit'];

            setting()->set('inventory.units', json_encode((object) $setting_units));
            setting()->save();
        };

        if (isset($row['barcode'])) {
            $this->setBarcode($item, $row['barcode']);
        }

        return $row;
    }

    public function rules(): array
    {
        $rules = (new Request())->rules();

        unset($rules['name']);
        unset($rules['sale_price']);
        unset($rules['purchase_price']);

        return $rules;
    }
}
