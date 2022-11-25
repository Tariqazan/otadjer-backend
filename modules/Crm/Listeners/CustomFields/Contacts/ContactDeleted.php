<?php

namespace Modules\Crm\Listeners\CustomFields\Contacts;

use App\Traits\Modules;
use Modules\CustomFields\Models\FieldValue;
use Modules\Crm\Models\Contact;

class ContactDeleted
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Contact $contact)
    {
        if (!$this->moduleIsEnabled('crm') || !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        FieldValue::record($contact->id, get_class($contact))->delete();
    }
}
