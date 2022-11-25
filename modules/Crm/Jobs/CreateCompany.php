<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Company;

class CreateCompany extends Job
{
    protected $contact;

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
        $this->contact = Company::create($this->request->all());

        if (!empty($contact_type = $this->request->get('contact_type'))) {
            $company_contact = [
                'company_id' => company_id(),
                'created_by' => user()->id,
                'crm_contact_id' => $contact_type,
                'crm_company_id' => $this->contact->id,
            ];

            $this->company_contact = $this->dispatch(new CreateCompanyContact($company_contact));
        }

        // Upload picture
        if ($this->request->file('picture')) {
            $media = $this->getMedia($this->request->file('picture'), 'company');

            $this->contact->attachMedia($media, 'picture');
        }

        return $this->contact;
    }
}
