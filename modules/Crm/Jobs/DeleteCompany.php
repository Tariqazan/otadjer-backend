<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Log;
use Modules\Crm\Models\Note;
use Modules\Crm\Models\Task;
use Modules\Crm\Models\Email;
use Modules\Crm\Models\Schedule;
use Modules\Crm\Models\CompanyContact;

class DeleteCompany extends Job
{
    protected $company;

    /**
     * Create a new job instance.
     *
     * @param  $company
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return boolean|Exception
     */
    public function handle()
    {
        $this->authorize();

        $company_contact = CompanyContact::where('crm_company_id', $this->company->id)->delete();
        $note = Note::where('noteable_id', $this->company->id)->where('noteable_type', 'Modules\Crm\Models\Company')->delete();
        $log = Log::where('logable_id', $this->company->id)->where('logable_type', 'Modules\Crm\Models\Company')->delete();
        $schedule = Schedule::where('scheduleable_id', $this->company->id)->where('scheduleable_type', 'Modules\Crm\Models\Company')->delete();
        $task = Task::where('taskable_id', $this->company->id)->where('taskable_type', 'Modules\Crm\Models\Company')->delete();
        $email = Email::where('emailable_id', $this->company->id)->where('emailable_type', 'Modules\Crm\Models\Company')->delete();

        $this->company->delete();

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
            $message = trans('messages.warning.deleted', ['name' => $this->company->contact->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
            'deals' => 'deals',
        ];

        return $this->countRelationships($this->company, $rels);
    }
}
