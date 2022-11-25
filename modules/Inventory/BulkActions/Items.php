<?php

namespace Modules\Inventory\BulkActions;

use App\Abstracts\BulkAction;
use App\Exports\Common\Items as Export;
use App\Models\Common\Item;
use App\Jobs\Common\DeleteItem;
use Modules\Inventory\Jobs\Items\DeleteItem as InventoryDeleteItem;

class Items extends BulkAction
{
    public $model = Item::class;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-common-items',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-common-items',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-common-items',
        ],
    ];

    public function destroy($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            try {
                $inventory_item = $item->inventory()->first();

                if (empty($inventory_item)) {
                    $this->dispatch(new DeleteItem($item));
                } else {
                    $this->dispatch(new InventoryDeleteItem($item));
                }
            } catch (\Exception $e) {
                flash($e->getMessage())->error()->important();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return $this->exportExcel(new Export($selected), trans_choice('general.items', 2));
    }
}
