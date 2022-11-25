<?php

namespace Modules\Crm\Jobs;

use Date;
use App\Abstracts\Job;
use Modules\Crm\Models\Task;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Company;

class CreateTask extends Job
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
            $row = Contact::find($this->request->get('id'))->tasks();
        } else {
            $row = Company::find($this->request->get('id'))->tasks();
        }

        if (!$this->request->get('started_at')) {
            $this->request['started_at'] = Date::now()->toDateString();
        }

        $task = $row->save(new Task($this->request->all()));

        return $task;
    }
}
