<?php

namespace Modules\Inventory\BulkActions;

use App\Abstracts\BulkAction;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Jobs\Warehouses\DeleteWarehouse;

class Warehouses extends BulkAction
{
    public $model = Warehouse::class;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-inventory-warehouses',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-inventory-warehouses',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-inventory-warehouses',
        ],
    ];

    public function destroy($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            try {
                $this->dispatch(new DeleteWarehouse($item));
            } catch (\Exception $e) {
                flash($e->getMessage())->error()->important();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return \Excel::download(new Export($selected), trans_choice('inventory::general.warehouses', 2) . '.xlsx');
    }
}
