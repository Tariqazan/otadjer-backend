<?php

namespace Modules\Inventory\Jobs\Variants;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\Variant;

class CreateVariant extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): Variant
    {
        \DB::transaction(function () {
            $this->model = Variant::create($this->request->all());

            $variant_items = $this->request->get('items');

            foreach ($variant_items as $variant_item) {
                if (empty($variant_item['name'])) {
                    continue;
                }

                $value_request = [
                    'company_id'    => $this->model->company_id,
                    'variant_id'    => $this->model->id,
                    'name'          => $variant_item['name'],
                ];

                $variant_item = $this->dispatch(new CreateVariantValue($value_request));
            }
        });

        return $this->model;
    }
}
