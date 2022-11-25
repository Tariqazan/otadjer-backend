<?php

namespace Modules\Inventory\Jobs\Variants;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldDelete;


class DeleteVariant extends Job implements ShouldDelete
{
    public function handle(): bool
    {
        $this->authorize();

        \DB::transaction(function () {
            $this->deleteRelationships($this->model, [
                'values'
            ]);

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
            'item_groups' => 'items',
        ];

        return $this->countRelationships($this->model, $rels);
    }
}
