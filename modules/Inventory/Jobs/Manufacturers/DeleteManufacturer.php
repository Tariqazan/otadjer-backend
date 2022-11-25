<?php

namespace Modules\Inventory\Jobs\Manufacturers;

use App\Abstracts\Job;

class DeleteManufacturer extends Job
{
    protected $manufacturer;

    /**
     * Create a new job instance.
     *
     * @param  $warehouse
     */
    public function __construct($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * Execute the job.
     *
     * @return boolean|Exception
     */
    public function handle()
    {
        $this->authorize();

        $this->manufacturer->delete();

        return true;
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        if ($relationships = $this->getRelationships()) {
            $message = trans('messages.warning.deleted', ['name' => $this->manufacturer->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
            'inventory_manufacturer_items'   => 'items',
            'inventory_manufacturer_vendors' => 'vendors',
        ];

        return $this->countRelationships($this->item, $rels);
    }
}
