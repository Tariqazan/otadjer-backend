<?php

namespace Modules\Inventory\BulkActions;

use App\Abstracts\BulkAction;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Jobs\ItemGroups\DeleteItemGroup;

class ItemGroups extends BulkAction
{
    public $model = ItemGroup::class;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-inventory-item-groups',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-inventory-item-groups',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-inventory-item-groups',
        ],
    ];

    public function destroy($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            try {
                $this->dispatch(new DeleteItemGroup($item));
            } catch (\Exception $e) {
                flash($e->getMessage())->error()->important();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return $this->exportExcel(new Export($selected), trans_choice('inventory::general.item_groups', 2));
    }
}
