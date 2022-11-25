<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\DealActivityType;

class CreateDealActivityType extends Job
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
     * @return Deal
     */
    public function handle()
    {
        $deal_activity_type = DealActivityType::create($this->request->all());

        return $deal_activity_type;
    }
}