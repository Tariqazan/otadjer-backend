<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\CompanyContact;

class UpdateCompany extends Job
{
    protected $company;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $company
     * @param  $request
     */
    public function __construct($company, $request)
    {
        $this->company = $company;
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Company
     */
    public function handle()
    {
        $this->authorize();

        $this->company->update($this->request->all());

        $company_contact = CompanyContact::where('crm_company_id', $this->company->id)->update([
            'crm_contact_id' =>  $this->request->contact_type
        ]);

        return $this->company;
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        if (($this->request['enabled'] == 0) && ($relationships = $this->getRelationships())) {
            $message = trans('messages.warning.disabled', ['name' => $this->company->contact->name, 'text' => implode(', ', $relationships)]);

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
