<?php

namespace Modules\Inventory\Jobs\Items;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Jobs\ItemGroups\DeleteItemGroup;
use Modules\Inventory\Jobs\ItemGroups\DeleteItemGroupVariantItem;
use Modules\Inventory\Jobs\ItemGroups\DeleteItemGroupVariantValue;

class DeleteItem extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        $this->authorize();

        \DB::transaction(function () {
            $inventory_items = $this->model->inventory()->get();

            $item_group_item = ItemGroupItem::where('item_id', $this->model->id)->pluck('item_group_id');

            if (count($item_group_item) == 1) {
                $item_group = ItemGroup::find($item_group_item[0]);

                foreach ($item_group->items as $group_item) {
                    if ($group_item->item_id == $this->model->id) {
                        break;
                    }
                }

                foreach ($item_group->variant_values as $group_value) {
                    if ($group_value->item_id == $this->model->id) {
                        break;
                    }
                }

                if (count($item_group->items) == 1 && count($item_group->variants) == 1) {
                    $response = $this->ajaxDispatch(new DeleteItemGroup($item_group));

                    return $response;
                } else {
                    if (count($item_group->variants) == 1) {
                        $this->ajaxDispatch(new DeleteItemGroupVariantValue($group_value));
                    }
                    $this->ajaxDispatch(new DeleteItemGroupVariantItem($group_item));
                }
            }


            foreach ($inventory_items as $inventory_item) {
                $this->deleteRelationships($inventory_item, [
                    'histories'
                ]);

                $inventory_item->delete();
            }

            $this->model->delete();
        });

        return true;
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        #Todo added releations
        if ($relationships = $this->getRelationships()) {
            $message = trans('messages.warning.deleted', ['name' => $this->model->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
            'invoice_items' => 'invoices',
            'bill_items' => 'bills',
        ];

        return $this->countRelationships($this->model, $rels);
    }
}
