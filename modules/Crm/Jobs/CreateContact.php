<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use Modules\Crm\Models\Contact;

class CreateContact extends Job
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
        \DB::transaction(function () {
            $this->contact = Contact::create($this->request->all());

            if (!empty($contact_type = $this->request->get('contact_type'))) {
                $contact_company = [
                    'company_id' => company_id(),
                    'created_by' => user()->id,
                    'crm_contact_id' => $this->contact->id,
                    'crm_company_id' => $contact_type,
                ];

                $this->item = $this->dispatch(new CreateCompanyContact($contact_company));
            }

            // Upload picture
            if ($this->request->file('picture')) {
                $media = $this->getMedia($this->request->file('picture'), 'contact');

                $this->contact->attachMedia($media, 'picture');
            }
        });

        return  $this->contact;
    }
}
