<?php

namespace Modules\Inventory\Jobs\Manufacturers;

use App\Abstracts\Job;
use Modules\Inventory\Models\ManufacturerVendor;

class CreateManufacturerVendor extends Job
{
    protected $vendor_id;

    protected $manufacturer;

    /**
     * Create a new job instance.
     *
     * @param  $request
     */
    public function __construct($vendor_id, $manufacturer)
    {
        $this->vendor_id = $vendor_id;
        $this->manufacturer = $manufacturer;
    }

    /**
     * Execute the job.
     *
     * @return ManufacturerVendor
     */
    public function handle()
    {
        $manufacturer_vendor = ManufacturerVendor::create([
            'company_id'      => $this->manufacturer->company_id,
            'manufacturer_id' => $this->manufacturer->id,
            'vendor_id'       => $this->vendor_id
        ]);

        return $manufacturer_vendor;
    }
}
