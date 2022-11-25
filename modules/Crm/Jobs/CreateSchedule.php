<?php

namespace Modules\Crm\Jobs;

use Date;
use App\Abstracts\Job;
use Modules\Crm\Models\Schedule;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Company;

class CreateSchedule extends Job
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
     * @return Contact
     */
    public function handle()
    {
        if ($this->request->get('type') == 'contacts') {
            $row = Contact::find($this->request->get('id'))->schedules();
        } else {
            $row = Company::find($this->request->get('id'))->schedules();
        }

        if (!$this->request->get('started_at')) {
            $this->request['started_at'] = Date::now()->toDateString();
        }

        if (!$this->request->get('ended_at')) {
            $this->request['ended_at'] = Date::now()->toDateString();
        }

        $schedule = $row->save(new Schedule($this->request->all()));

        return $schedule;
    }
}
