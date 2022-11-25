<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\VariantValue;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Jobs\ItemGroups\CreateItemGroupVariantValue;

class CreateItemGroupItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    /**
     * Create a new job instance.
     *
     * @param  $request
     * @param  $item
     */
    public function __construct($request, $item)
    {
        $this->request = $request;

        $this->item = $item;

        parent::__construct($request);
    }

    public function handle(): ItemGroupItem
    {
        $this->model = ItemGroupItem::create($this->item);

        foreach ($this->request->variant_value_id as $variant_value_id) {
            $variant_id = VariantValue::where('id', $variant_value_id)->value('variant_id');

            $item_variant_value = [
                'company_id'            => $this->model->company_id,
                'variant_id'            => $variant_id,
                'variant_value_id'      => $variant_value_id,
                'item_id'               => $this->model->item_id,
                'item_group_id'         => $this->model->item_group_id,
                'item_group_item_id'    => $this->model->id,
            ];

            $item_group_item_variant_value = $this->dispatch(
                new CreateItemGroupVariantValue(
                    $item_variant_value
                )
            );
        };

        return $this->model;
    }
}
