<?php

namespace Modules\Inventory\Jobs\Warehouses;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;

class DeleteWarehouse extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        $this->authorize();
        
        \DB::transaction(function () {
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
            'items' => 'items',
        ];

        return $this->countRelationships($this->model, $rels);
    }
}
