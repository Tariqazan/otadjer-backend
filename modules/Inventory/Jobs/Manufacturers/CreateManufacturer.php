<?php

namespace Modules\Inventory\Jobs\Manufacturers;

use App\Abstracts\Job;
use Modules\Inventory\Models\Manufacturer;

class CreateManufacturer extends Job
{
    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $request
    */
    public function __construct($request)
    {
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Manufacturer
    */
    public function handle()
    {
        $manufacturer = Manufacturer::create($this->request->all());

        if (!empty($this->request->get('create_vendor', false))) {
            $manufacturer_vendor = $this->dispatch(new CreateManufacturerVendor($this->request->get('vendor_id'), $manufacturer));
        }

        return $manufacturer;
    }
}
