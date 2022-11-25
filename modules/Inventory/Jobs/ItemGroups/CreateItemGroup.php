<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\History;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Jobs\Items\CreateItem;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Jobs\ItemGroups\CreateItemGroupVariant;

class CreateItemGroup extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): ItemGroup
    {
        \DB::transaction(function () {
            $this->model = ItemGroup::create($this->request->all());

            if ($this->request->file('picture')) {
                $media = $this->getMedia($this->request->file('picture'), 'items');

                $this->model->attachMedia($media, 'picture');
            }

            // Add item group variant
            if ($this->request->variants) {
                foreach ($this->request->variants as $variant) {
                    if ($variant['variant_id'] == null){
                        continue;
                    }

                    $variant_data = [
                        'company_id'        => $this->model->company_id,
                        'item_group_id'     => $this->model->id,
                        'variant_id'        => $variant['variant_id'],
                        'variant_values'    => $variant['variant_values'],
                    ];

                    $variant_data['variant_values'] = $variant['variant_values'];

                    $item_group_variant = $this->dispatch(new CreateItemGroupVariant($variant_data));
                }
            }

            // Add Items
            if ($this->request->items) {
                foreach ($this->request->items as $item_data) {
                    $main_request = request();

                    $item_data['company_id']    = $this->model->company_id;
                    $item_data['description']   = $this->request->description;
                    $item_data['category_id']   = $this->request->category_id;
                    $item_data['enabled']       = $this->request->enabled;
                    $item_data['tax_ids']       = $this->request->tax_ids;

                    if (!isset($item_data['reorder_level'])) {
                        $item_data['reorder_level'] = 0;
                    }

                    if (!isset($item_data['unit'])) {
                        $item_data['unit'] = $this->request->unit;
                    }

                    // This field for Inventory item...
                    $item_data['vendor_id']         = 0;
                    $item_data['track_inventory']   = 1;

                    $item_data['items'][] = [
                        'opening_stock' => $item_data['opening_stock'],
                        'opening_stock_value' => $item_data['opening_stock'],
                        'reorder_level' => $item_data['reorder_level'],
                        'warehouse_id' => $item_data['warehouse_id'],
                        'default_warehouse' => 1,
                        'sku' => $item_data['sku'],
                        'unit' => $item_data['unit'],
                        'barcode' => $item_data['barcode'] ?? '',
                    ];

                    foreach ($main_request->all() as $key => $value) {
                        $main_request->request->remove($key);
                    }

                    // Set laravel request() data...
                    $main_request->merge($item_data);

                    $item = $this->dispatch(new CreateItem($item_data));

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

                    $item_group_item = $this->dispatch(new CreateItemGroupItem($main_request, $group_item));
                }
            }
        });

        return $this->model;
    }
}
