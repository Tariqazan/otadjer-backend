<?php

namespace Modules\Crm\Jobs;

use Date;
use App\Abstracts\Job;
use Modules\Crm\Models\DealActivity;

class CreateDealActivity extends Job
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
     * @return DealActivity
     */
    public function handle()
    {
        if (!$this->request->get('date')) {
            $this->request['date'] = Date::now()->toDateString();
        }

        $deal_activity = DealActivity::create($this->request->all());

        return $deal_activity;
    }
}
