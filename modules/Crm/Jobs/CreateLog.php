<?php

namespace Modules\Crm\Jobs;

use Date;
use App\Abstracts\Job;
use Modules\Crm\Models\Log;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Company;

class CreateLog extends Job
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
            $row = Contact::find($this->request->get('id'))->logs();
        } else {
            $row = Company::find($this->request->get('id'))->logs();
        }

        if (!$this->request->get('date')) {
            $this->request['date'] = Date::now()->toDateString();
        }

        $log = $row->save(new Log($this->request->all()));

        return $log;
    }
}
