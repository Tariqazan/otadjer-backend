<?php

namespace Modules\Inventory\Jobs\Variants;

use App\Abstracts\Job;
use Modules\Inventory\Models\Variant;

class UpdateVariantValue extends Job
{
    protected $variantValue;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $variantValue
     * @param  $request
     */
    public function __construct($variantValue, $request)
    {
        $this->variantValue = $variantValue;
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Variant
     */
    public function handle()
    {
        $this->variantValue->update($this->request->all());

        return $this->variantValue;
    }
}
