<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Models\Common\Item;
use App\Interfaces\Job\ShouldDelete;
use Modules\Inventory\Models\History;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Models\ItemGroupItemVariantValue;
use Modules\Inventory\Models\Item as InventoryItem;

class DeleteItemGroup extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        \DB::transaction(function () {
            $items = ItemGroupItem::where('item_group_id', $this->model->id)->pluck('item_id')->toArray();

            // foreach ($items as $item_id) {
            //     $this->item = Item::where('id', $item_id)->first();
            // }

            //$this->authorize();

            $this->deleteRelationships($this->model, [
                'items', 'variants', 'variant_values'
            ]);

            $this->model->delete();

            foreach ($items as $item_id) {
                $this->item = Item::where('id', $item_id)->delete();
                $this->inventory_item = InventoryItem::where('item_id', $item_id)->delete();
                $this->history = History::where('item_id', $item_id)->delete();
            }
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
            $message = trans('messages.warning.deleted', ['name' => $this->item->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
            'invoice_items' => 'invoices',
            'bill_items' => 'bills',
        ];

        return $this->countRelationships($this->item, $rels);
    }
}
