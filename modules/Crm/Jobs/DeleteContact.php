<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Log;
use Modules\Crm\Models\Note;
use Modules\Crm\Models\Task;
use Modules\Crm\Models\Email;
use Modules\Crm\Models\Schedule;
use Modules\Crm\Models\CompanyContact;

class DeleteContact extends Job
{
    protected $contact;

    /**
     * Create a new job instance.
     *
     * @param  $contact
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return boolean|Exception
     */
    public function handle()
    {
        $this->authorize();

        $contact_company = CompanyContact::where('crm_contact_id', $this->contact->id)->delete();
        $note = Note::where('noteable_id', $this->contact->id)->where('noteable_type', 'Modules\Crm\Models\Contact')->delete();
        $log = Log::where('logable_id', $this->contact->id)->where('logable_type', 'Modules\Crm\Models\Contact')->delete();
        $schedule = Schedule::where('scheduleable_id', $this->contact->id)->where('scheduleable_type', 'Modules\Crm\Models\Contact')->delete();
        $task = Task::where('taskable_id', $this->contact->id)->where('taskable_type', 'Modules\Crm\Models\Contact')->delete();
        $email = Email::where('emailable_id', $this->contact->id)->where('emailable_type', 'Modules\Crm\Models\Contact')->delete();

        $this->contact->delete();

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
            $message = trans('messages.warning.deleted', ['name' => $this->contact->contact->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [
            'deals' => 'deals',
        ];

        return $this->countRelationships($this->contact, $rels);
    }
}
