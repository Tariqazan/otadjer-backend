<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;

class DeleteItemGroupVariantItem extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        //$this->authorize();

        $this->model->delete();

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
