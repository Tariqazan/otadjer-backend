<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\DealActivity;

class UpdateDealActivity extends Job
{
    protected $deal_activity;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $deal
     * @param  $request
     */
    public function __construct($deal_activity, $request)
    {
        $this->deal_activity = $deal_activity;
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return DealActivity
     */
    public function handle()
    {
        $this->authorize();

        if (is_array($this->request->done) == true) {
            $this->request->merge(['done' => $this->request->done[0]]);
        }

        $this->deal_activity->update($this->request->all());

        return $this->deal_activity;
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        if (($this->request['enabled'] == 0) && ($relationships = $this->getRelationships())) {
            $message = trans('messages.warning.disabled', ['name' => $this->deal_activity->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
        ];

        return $this->countRelationships($this->deal_activity, $rels);
    }
}
