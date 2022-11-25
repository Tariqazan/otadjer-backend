<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Models\Common\Item;
use App\Jobs\Common\DeleteItem as CoreDeleteItem;
use App\Interfaces\Job\ShouldUpdate;
use App\Models\Document\DocumentItem;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Jobs\Items\CreateItem;
use Modules\Inventory\Jobs\Items\UpdateItem;
use Modules\Inventory\Models\ItemGroupVariant;
use Modules\Inventory\Jobs\Items\DeleteItem;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\ItemGroupVariantValue;
use Modules\Inventory\Jobs\ItemGroups\CreateItemGroupVariant;

class UpdateItemGroup extends Job implements ShouldUpdate
{
    public function handle(): ItemGroup
    {
        \DB::transaction(function () {
            $item_group_picture = $this->model->picture;

            $this->model->update($this->request->all());

            if ($this->request->file('picture')) {
                $media = $this->getMedia($this->request->file('picture'), 'items');

                $this->model->attachMedia($media, 'picture');
            }

            // Add item group variant
            if ($this->request->variants) {
                $group_variant = ItemGroupVariant::where('item_group_id', $this->model->id)->delete();

                foreach ($this->request->variants as $variant) {
                    $variant_data = [
                        'company_id' => $this->model->company_id,
                        'item_group_id' => $this->model->id,
                        'variant_id' => $variant['variant_id'],
                        'variant_values' => $variant['variant_values'],
                    ];

                    $item_group_variant = $this->dispatch(new CreateItemGroupVariant($variant_data));
                }
            }

            if ($this->request->has('items')) {
                $item_group_variant_items = ItemGroupItem::where('item_group_id', $this->model->id)->get();

                if (!empty($item_group_variant_items[0])) {
                    foreach ($item_group_variant_items as $item_group_variant_item) {
                        $document_item = DocumentItem::where('item_id', $item_group_variant_item->item_id)->first();

                        if (empty($document_item)){
                            $item = Item::find($item_group_variant_item->item_id);

                            foreach ($item->inventory()->get() as $inventory_item) {
                                $this->deleteRelationships($inventory_item, [
                                    'histories'
                                ]);

                                $inventory_item->delete();
                            };

                            $this->dispatch(new CoreDeleteItem($item));
                        }

                        $item_group_variant_item->delete();
                    }
                }

                ItemGroupVariantValue::where('item_group_id', $this->model->id)->delete();

                foreach ($this->request->items as $item_data) {
                    $item_data['company_id']    = $this->model->company_id;
                    $item_data['description']   = $this->request->description;
                    $item_data['category_id']   = $this->request->category_id;
                    $item_data['tax_ids']       = $this->request->tax_ids;
                    $item_data['enabled']       = $this->request->enabled;

                    if (!isset($item_data['reorder_level'])) {
                        $item_data['reorder_level'] = 0;
                    }

                    // This field for Inventory item...
                    $item_data['vendor_id'] = 0;
                    $item_data['track_inventory'] = 1;
                    $item_data['unit'] = $this->request->unit;
                    $item_data['items'][0] = [
                        'opening_stock' => $item_data['opening_stock'],
                        'opening_stock_value' => $item_data['opening_stock'],
                        'reorder_level' => $item_data['reorder_level'],
                        'warehouse_id' => $item_data['warehouse_id'],
                        'default_warehouse' => 1,
                        'sku' =>  $item_data['sku'],
                        'barcode' => $item_data['barcode'] ?? '',
                    ];

                    $core_item = Item::where('name', $item_data['name'])->first();

                    if (empty($core_item)) {
                        $item = $this->dispatch(new CreateItem($item_data));
                    } else {
                        $item_data['items'][0] += ['id' => $core_item->id];

                        $item = $this->dispatch(new UpdateItem($core_item, $item_data));
                    }

                    $main_request = request();

                    foreach ($main_request->all() as $key => $value) {
                        $main_request->request->remove($key);
                    }

                    // Set laravel request() data...
                    $main_request->merge($item_data);

                    if ($this->request->file('picture')) {
                        $item->attachMedia($media, 'picture');
                    }

                    if (!isset($item_data['variant_value_id'])) {
                        $item_data['variant_value_id'] = $item_data['key'];
                    }

                    //Create ItemGroupVariantItem
                    $group_item = [
                        'company_id'    => $this->model->company_id,
                        'item_id'       => $item->item_id,
                        'item_group_id' => $this->model->id,
                    ];

                    $item_group_item = $this->dispatch(new UpdateItemGroupItem($main_request, $group_item));
                }
            }
        });

        return $this->model;
    }
}
