<?php

namespace Modules\Crm\Listeners\CustomFields\Companies;

use App\Traits\Modules;
use Modules\CustomFields\Models\FieldValue;
use Modules\Crm\Models\Company;

class CompanyDeleted
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Company $company)
    {
        if (!$this->moduleIsEnabled('crm') || !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        FieldValue::record($company->id, get_class($company))->delete();
    }
}
