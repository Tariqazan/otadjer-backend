<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\CompanyContact;

class UpdateContact extends Job
{
    protected $contact;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $contact
     * @param  $request
     */
    public function __construct($contact, $request)
    {
        $this->contact = $contact;
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Contact
     */
    public function handle()
    {
        $this->authorize();

        $this->contact->update($this->request->all());

        $contact_company = CompanyContact::where('crm_contact_id', $this->contact->id)->update([
            'crm_company_id' =>  $this->request->contact_type
        ]);

        return $this->contact;
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        if (($this->request['enabled'] == 0) && ($relationships = $this->getRelationships())) {
            $message = trans('messages.warning.disabled', ['name' => $this->contact->name, 'text' => implode(', ', $relationships)]);

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
