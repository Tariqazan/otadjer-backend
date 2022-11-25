<?php

namespace Modules\Crm\Listeners\Update;

use App\Models\Common\Contact;
use Modules\Crm\Models\Company as CrmCompany;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\Artisan;
use Modules\Crm\Models\Contact as CrmContact;
use App\Abstracts\Listeners\Update as Listener;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;

class Version2218 extends Listener implements ShouldUpdateAllCompanies
{
    const ALIAS = 'crm';

    const VERSION = '2.2.18';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updateData();
    }

    protected function updateData()
    {
        $crm_contacts = CrmContact::all();

        foreach ($crm_contacts as $key => $crm_contact) {
            if (!$crm_contact->contact) {
                $crm_contact->delete();
            }
        }

        $crm_companies = CrmCompany::all();

        foreach ($crm_companies as $key => $crm_company) {
            if (!$crm_company->contact) {
                $crm_company->delete();
            }
        }
    }
}
