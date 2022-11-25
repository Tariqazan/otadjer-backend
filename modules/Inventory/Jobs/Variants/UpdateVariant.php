<?php

namespace Modules\Inventory\Jobs\Variants;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\Variant;

class UpdateVariant extends Job implements ShouldUpdate
{
    public function handle(): Variant
    {
        \DB::transaction(function () {
            $this->model->update($this->request->all());

            if (!empty($this->request->get('inline', 0))) {
            return $this->model;
            }

            // Delete current items
            $this->deleteRelationships($this->model, ['values']);

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

    public function getRelationships()
    {
        $rels = [
            'transactions' => 'transactions',
        ];

        return $this->countRelationships($this->warehouse, $rels);
    }
}
